<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FieldType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'unique'
    ] ;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'unique' => 'boolean',
    ];

    public function fields():hasMany
    {
        return $this->hasMany(Field::class);
    }

}
