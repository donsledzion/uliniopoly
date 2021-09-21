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
        return $this->belongsTo(Game::class);
    }

    public function move()
    {
        $result = $this->rollDices();
        $total = $result[0] + $result[1] ;
        $this->field_no= (($this->field_no+$total)%40)+1;

        $this->save();
        return $result;
    }

    public function rollDice(){
        return mt_rand(1,6);
    }

    public function rollDices(){
        $firstRoll = $this->rollDice();
        $secondRoll = $this->rollDice();
        return [
            $firstRoll,
            $secondRoll
        ];
    }
}
