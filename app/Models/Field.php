<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'field_type_id',
        'group',
        'pricing_id',
        'sold',
        'mortgage'
    ] ;

    protected $casts = [
        'sold' => 'boolean',
        'mortgage' => 'boolean',
        'created_at' => 'boolean',
        'updated_at' => 'boolean',
    ];

    public function boards():belongsToMany
    {
        return $this->belongsToMany(Board::class);
    }

    public function type():belongsTo
    {
        return $this->belongsTo(FieldType::class,'field_type_id');
    }

    public function pricing():hasOne
    {
        return $this->hasOne(Pricing::class,'id');
    }
}
