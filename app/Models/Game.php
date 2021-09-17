<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_id',
        'player_1',
        'player_2',
        'player_3',
        'player_4',
        'current_player'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function create(array $attributes):Game
    {
        $startCash = 1200 ;

        $game = new Game();

        $game->board_id = null ;
        $game->player_1 = null ;
        $game->player_2 = null ;
        $game->player_3 = null ;
        $game->player_4 = null ;

        $game->current_player = 0 ;

        if(isset($attributes['board_id'])){
            $game->board_id = $attributes['board_id'];
        }

        if(isset($attributes['player_1'])){
            $player_1 = Player::create([
                'user_id' =>$attributes['player_1'],
                'cash' => $startCash,
            ]);
            $game->player_1 = $player_1->id;
        }

        if(isset($attributes['player_2'])){
            $player_2 = Player::create([
                'user_id' =>$attributes['player_2'],
                'cash' => $startCash,
            ]);
            $game->player_2 = $player_2->id;
        }

        if(isset($attributes['player_3'])){
            $player_3 = Player::create([
                'user_id' =>$attributes['player_3'],
                'cash' => $startCash,
            ]);
            $game->player_3 = $player_3->id;
        }

        if(isset($attributes['player_4'])){
            $player_4= Player::create([
                'user_id' =>$attributes['player_4'],
                'cash' => $startCash,
            ]);
            $game->player_4 = $player_4->id;
        }
        $game->save();
        return $game;
    }

    public function board():belongsTo
    {
        return $this->belongsTo(Board::class);
    }

    public function removePlayer($id):bool
    {
        if($this->player_1 == $id){
            $this->player_1 = null ;
            return true;
        }
        if($this->player_2 == $id){
            $this->player_2 = null ;
            return true;
        }
        if($this->player_3 == $id){
            $this->player_3 = null ;
            return true;
        }
        if($this->player_4 == $id){
            $this->player_4 = null ;
            return true;
        }

        return false;
    }

    public function player1():hasOne
    {
        return $this->hasOne(Player::class,'id','player_1');
    }

    public function player2():hasOne
    {
        return $this->hasOne(Player::class,'id','player_2');
    }

    public function player3():hasOne
    {
        return $this->hasOne(Player::class,'id','player_3');
    }

    public function player4():hasOne
    {
        return $this->hasOne(Player::class,'id','player_4');
    }

    public function players():Collection
    {
        $players = collect();
        if($this->player1){
            $players->push($this->player1);
        }
        if($this->player2){
            $players->push($this->player2);
        }
        if($this->player3){
            $players->push($this->player3);
        }
        if($this->player4){
            $players->push($this->player4);
        }
        return $players;
    }
}
