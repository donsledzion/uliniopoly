<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FieldGame extends Model
{
    use HasFactory;

    protected $table='field_game';

    protected $fillable = [
        'game_id',
        'board_slot',
        'field_id',
        'sold',
        'player_id',
        'mortgage',
    ];

    protected $casts = [
        'sold' => 'bool',
        'mortgage' => 'bool',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function game():belongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function fields():hasMany
    {
        return $this->hasMany(Field::class);
    }

    public function player():belongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
