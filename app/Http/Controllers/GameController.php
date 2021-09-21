<?php

namespace App\Http\Controllers;

use App\Enums\GameSeat;
use App\Events\PlayerMoved;
use App\Http\Requests\GameRequest;
use App\Models\Board;
use App\Models\Game;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use PHPUnit\Exception;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        try {
            $games = Game::all();
            return view('games.index', [
                'games' => $games,
            ]);
        } catch(Exception $e){
            Log::error('An exception thrown on attempt to display Games list: '.$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        try {
            $boards = Board::all();
            $players = User::all();

            return view('games.create', [
                'boards' => $boards,
                'players' => $players,
            ]);
        } catch(\Exception $e){
            Log::error("An exception thrown on attempt to display game - creation form. ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Mixed
     */
    public function store(GameRequest $request)
    {
        try {
            $attributes = $request->validated();

            $game = Game::create($attributes);
            foreach($attributes['players'] as $key => $user) {
                $game->players()->create([
                    'user_id' => $user,
                        'game_id' => $game->id,
                        'seat' => GameSeat::seat($key+1),
                        'balance' => $game->start_balance,
                        'field_no' => 1
                    ]);
            }
            return view('games.show', [
                'game' => $game,
            ]);
        } catch(\Exception $e){
            Log::error("An exception caught on attempt to create new game: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(Game $game)
    {
        return view('games.show',[
            'game' => $game,
        ]);
    }

    public function retrieve(Game $game):JsonResponse
    {
        $game = Game::with('players.user','board')->find($game->id);
        return response()->json([
            'game' => $game,
            'players_count' => $game->players->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function move(Game $game)
    {
        try {
            error_log("Move it!");
            $lastDraw = $game->nextMove();

            event(new PlayerMoved($game, $lastDraw));

            return response()->json($game);
        } catch(\Exception $e){
            error_log("GameController@move error: ".$e->getMessage());
            return response()->json([
                'message' => 'Shit happend',
                'error' => $e->getMessage()
            ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Game $game)
    {
        try{
            DB::beginTransaction();
            $game->players()->delete();
            $game->delete();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Poprawnie usunięto grę',
            ]);
        }catch(Exception $e){
            DB::rollBack();
            Log::error("An exception caught on attempt to delete game:".$e->getMessage());
            return response()->json([
                'status' => 'fail',
                'message' => "An exception caught on attempt to delete game:".$e->getMessage()
            ]);
        }
    }
}
