<?php

namespace App\Models;

use App\Enums\GameSeat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'seat',
        'balance',
        'field_no',
        'penalty',
        'moves_left',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user():belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function game():belongsTo
    {
        return $this->belongsTo(Game::class,'game_id');
    }

    public function field()
    {
        return $this->game->board->fields->where('pivot.board_slot_id',$this->field_no)->first();
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function freeToMove()
    {
        if($this->penalty>0) {
            return false;
        }
        return true;
    }

    public function goToJail(){
        $jail_slot = 11 ;
        $this->field_no = $jail_slot;
        $this->penalty=3;
        $this->save();
    }

    public function takeTurn()
    {
        $result = $this->rollDices();
        $total = array_sum($result) ;
        // player drawn dices.
        // Now GM should check whether:
        // 1) player is free to go? (Jail or some other penalty)
        // 2) player has drawn double (in this case system should check doubles in row counter)
        $this->field_no= (($this->field_no+$total)%40)+1;
        $this->save();
        return $result;
    }

    public function passStartBonus()
    {
        $this->balance+=$this->game->start_bonus;
    }

    public function move(array $result)
    {
        error_log("Moving...");
        $fieldsToMove = array_sum($result);

        $moveFrom = $this->field_no;
        $moveTo = (($this->field_no+$fieldsToMove)%40)+1 ;
        $this->field_no = $moveTo;
        error_log("Player has moved to field: ".$moveTo);
        if($moveTo < $moveFrom){
            $this->passStartBonus();
        }
        $this->save();
    }

    public function bonusMove(){
        error_log("adding extra bonus move");
        $this->moves_left++;
        $this->save();
        error_log("moves left: ".$this->moves_left);
    }

    public function rollDice(){
        return mt_rand(1,6);
    }

    public function setMovesLeft(int $movesLeft){
        $this->moves_left = $movesLeft;
        $this->save();
    }

    public function rollDices(){
        $firstDice = $this->rollDice();
        $secondDice = $this->rollDice();
        $this->moves_left--;
        $this->save();
        return [
            $firstDice,
            $secondDice
        ];
    }
}
