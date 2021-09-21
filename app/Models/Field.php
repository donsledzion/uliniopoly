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
        'salable',
        'sold',
        'mortgage'
    ] ;

    protected $casts = [
        'salable' => 'boolean',
        'sold' => 'boolean',
        'mortgage' => 'boolean',
        'created_at' => 'boolean',
        'updated_at' => 'boolean',
    ];

    public function boards():belongsToMany
    {
        return $this->belongsToMany(Board::class,'board_slot_field')->withPivot('board_slot_id');
    }

    public function type():belongsTo
    {
        return $this->belongsTo(FieldType::class,'field_type_id');
    }

    public function pricing():hasOne
    {
        return $this->hasOne(Pricing::class,'id');
    }

    public function action(Player $player)
    {
        $message = 'Player '.$player->user->name.' is supposed to take some action on' ;
        error_log("Action message: ".$message);
        return response()->json([
            'message' => $message,
        ]);
    }


}
