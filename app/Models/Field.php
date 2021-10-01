<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function games():hasMany
    {
        return $this->hasMany(Game::class,'field_game');
    }

    public function reaction(Player $player)
    {
        error_log("================================================");
        error_log("field type is: ".__($this->type->name));
        error_log("================================================");
        if($this->field_type_id == 4){
            $player->goToJail();
            $message = __('uliniopoly.players.player').' '.$player->user->name.' '.__('actions.goes_to_jail') ;
        } else if($this->field_type_id == 3){
            $message = __('uliniopoly.players.player').' '.$player->user->name.' '.__('actions.is_visiting_jail') ;
        } else if($this->field_type_id == 2){
            $message = __('uliniopoly.players.player').' '.$player->user->name.' '.__('actions.lands_on_start') ;
        } else if($this->field_type_id == 5){
            $message = __('uliniopoly.players.player').' '.$player->user->name.'  '.__('actions.restsing').' '.__($this->name) ;
        } else {
            $message = __('uliniopoly.players.player').' '.$player->user->name.'  '.__('actions.lands_on_field').' '.__($this->name);
            if($this->salable){
                if($player->game->gameFields->where('board_slot',$player->field_no)->first()->sold){
                    $message.= '\\n'.__('uliniopoly.fields.field').' '
                        .__('actions.belongs_to').' '
                    .$player->game->gameFields->where('board_slot',$player->field_no)->first()->player->name;
                } else {
                    $message.= '\\n'.__('uliniopoly.fields.field').' '.__('actions.is_for_sale').'!';
                }
            }
        }



        error_log("Action message: ".$message);
        return response()->json([
            'message' => $message,
        ]);
    }


}
