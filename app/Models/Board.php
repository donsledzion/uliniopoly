<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function slots():belongsToMany
    {
        return $this->belongsToMany(BoardSlot::class,'board_slot_field')->withPivot('field_id');
    }

    public function fields():belongsToMany
    {
        return $this->belongsToMany(Field::class,'board_slot_field')->withPivot('board_slot_id');
    }

    public function games():hasMany
    {
        return $this->hasMany(Game::class);
    }

    public function jail():Field
    {
        return $this->fields->where('field_type_id',3)->first();
    }

}
