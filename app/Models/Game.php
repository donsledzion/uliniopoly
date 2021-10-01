<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_id',
        'name',
        'start_balance',
        'start_bonus',
        'current_player',
        'round_log',
        'doubles_in_row'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function board():belongsTo
    {
        return $this->belongsTo(Board::class);
    }

    public function players():hasMany
    {
        return $this->hasMany(Player::class)->orderBy('seat');
    }

    public function users():hasManyThrough
    {
        return $this->hasManyThrough(User::class,Player::class);
    }

    public function fields():hasMany
    {
        return $this->hasMany(Field::class,'field_game');
    }

    public function gameFields():hasMany
    {
        return $this->hasMany(FieldGame::class);
    }

    public function log(string $message, bool $append = true)
    {
        if($append) {
            $this->round_log .= '\n' . $message;
        } else {
            $this->round_log = $message;
        }
        $this->save();
    }

    public function currentPlayer():Player
    {
        return $this->players->where('seat',$this->current_player)->first();
    }

    public function currentPlayerRoll(){
        $player = Player::find($this->currentPlayer()->id);
        $result = $player->rollDices();
        error_log("Player has drawn dices. Moves left: ".$player->moves_left);
        if($player->freeToMove()){
            //error_log("Player ".$currentPlayer->name." is free to move");
            $player->move($result);
            $this->log( $player->name." moved to field ".__($player->field()->name),false);
        }
        if($result[0] === $result[1]){
            $this->doubles_in_row++;
            if($this->doubles_in_row > 2){
                $player->goToJail();
                $this->log($player->name . " goes to JAIL!");
            } else {
                $player->bonusMove();
                $this->log($player->name . " has bonus move!");
            }
        } else {
            $this->doubles_in_row = 0 ;
        }
        $this->save();
        $player->save();
        error_log("Player has drawn. Moves left: ".$player->moves_left. " (after at Game@currentPlayerRoll())");
        return $result;
    }

    public function nextPlayer(){
        $this->current_player++;
        if($this->current_player>$this->players()->count()){
            $this->current_player = 1 ;
        }
        error_log("setting moves left...");
        $this->currentPlayer()->setMovesLeft(1) ;
        $this->doubles_in_row = 0 ;
        $this->save();
        return $this->players->where('seat',$this->current_player)->first();
    }

    public function nextMove(){
        $player = $this->currentPlayer();
        error_log("Current player is ".$player->name.", on field: ".$player->field_no);

        $playerResult = $player->rollDices();
        error_log(" moved to field ".$player->field_no);

        $this->log( $player->name." moved to field ".$player->field_no,false);

        $fieldLanded = $this->board->fields
            ->where('pivot.board_slot_id',$player->field_no)
            ->first();

        $fieldActionResponse = $fieldLanded->reaction($player)->getContent();

        $responseDecoded = json_decode($fieldActionResponse,true);

        $this->log($responseDecoded['message']);


        /*
         * if nothing special happens -> switch player to next one
         * */
        $this->nextPlayer();
        error_log("Game@nextMove() ->exiting");
        return $playerResult;
    }


}
