<?php

namespace App\Events;

use App\Models\Game;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayerMoved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $game;
    public $lastDraw;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Game $game, array $lastDraw)
    {
        $this->game = $game;
        $this->lastDraw = $lastDraw;
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
        $game = Game::with('players.user',)->find($this->game->id);
        return [
            'game' => $game,
            'lastDraw' => $this->lastDraw,
        ];
    }
}
