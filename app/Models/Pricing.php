<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\Collection;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'buy',
        'mortgage',
        'stop_single',
        'stop_1_cottage',
        'stop_2_cottage',
        'stop_3_cottage',
        'stop_4_cottage',
        'stop_hotel',
        'stop_1_of_kind',
        'stop_2_of_kind',
        'stop_3_of_kind',
        'stop_4_of_kind',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function field():belongsTo
    {
        return $this->belongsTo(Field::class);
    }

}
