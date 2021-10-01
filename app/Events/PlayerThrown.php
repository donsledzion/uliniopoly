<?php

namespace App\Events;

use App\Models\Game;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayerThrown implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $game;
    private $result;
    private $fields;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Game $game, array $result)
    {
        $this->game = $game;
        $this->result = $result;
        $this->fields = $this->game->gameFields;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('game.'.$this->game->id);
    }

    public function broadcastWith(){
        $game = Game::with('players','board')->find($this->game->id);
        $movesLeft = $this->game->currentPlayer()->moves_left;
        error_log("PlayerThrown@broadcastWith: ");
        return [
            'game' => $game,
            'fields' => $this->fields,
            'lastDraw' => $this->result,
            'movesLeft' => $movesLeft,
        ];
    }
}
