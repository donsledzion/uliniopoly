<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BoardSlot extends Model
{
    use HasFactory;


    public function boards():belongsToMany
    {
        return $this->belongsToMany(Board::class,'board_slot_field')
            ->withPivot('field_id');
    }
}
