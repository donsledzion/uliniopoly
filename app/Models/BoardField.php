<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardField extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_id',
        'field_id',
        'board_slot',
    ];
}
