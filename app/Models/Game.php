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
        'current_player'
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

    public function nextPlayer(){
        $this->current_player++;
        if($this->current_player>$this->players()->count()){
            $this->current_player = 1 ;
        }
        $this->save();
        return $this->players->where('seat',$this->current_player)->first();
    }

    public function nextMove(){
        $player = $this->nextPlayer();
        error_log("Player changed to ".$player->user->name.", current field: ".$player->field_no);
        $playerDrawn = $player->move();
        error_log("Player moved to field ".$player->field_no);

        $fieldLanded = $this->board->fields
            ->where('pivot.board_slot_id',$player->field_no)
            ->first();

        error_log("Field is ".__($fieldLanded->name));
        $fieldLanded->action($player);

        return $playerDrawn;
    }


}
