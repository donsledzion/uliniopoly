<?php

namespace App\Http\Controllers;

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
            error_log("Games: ".$games);
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
    public function store(Request $request)
    {
        try {
            if ($request->ajax()) {
                error_log('========================================================');
                error_log("Ajax request!");
                error_log("Game: " . json_encode($request->game));
                $game = $request->game;
                error_log('========================================================');
                error_log("game->id:".$game['id']);
                error_log("game->boardId:".$game['boardId']);
                error_log("game->playersCount:".$game['playersCount']);
                error_log("game->currentPlayer:".$game['currentPlayer']);
                error_log("game->player1->id:".$game['player1']['id']);
                error_log("game->player1->order:".$game['player1']['order']);
                error_log("game->player1->balance:".$game['player1']['balance']);
                error_log("game->player1->id:".$game['player1']['order']);
                error_log('========================================================');
                $currentGame = Game::find($game['id']);
                $currentGame->current_player = $game['currentPlayer'];
                $currentGame->save();
                $player1 = Player::find($currentGame->player_1);
                    $player1->field_no = $game['player1']['currentField'];
                    $player1->save();
                $player2 = Player::find($currentGame->player_2);
                    $player2->field_no = $game['player2']['currentField'];
                    $player2->save();
                $player3 = Player::find($currentGame->player_3);
                    $player3->field_no = $game['player3']['currentField'];
                    $player3->save();
                $player4 = Player::find($currentGame->player_4);
                    $player4->field_no = $game['player4']['currentField'];
                    $player4->save();

                error_log('========================================================');
                return response()->json([
                    'message' => "We've got ajax request!"
                ]);
            }
        } catch(\Exception $e) {
            Log::error("An exception while handling ajax request from the game: ".$e->getMessage());
            error_log("An exception while handling ajax request from the game: ".$e->getMessage());
        }


        try {
            $game = Game::create($request->all());

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
        $user1 = null ;
        $user2 = null ;
        $user3 = null ;
        $user4 = null ;
        if($game->player1) {
            $user1 = $game->player1->user;
        }
        if($game->player2) {
            $user2 = $game->player2->user;
        }
        if($game->player3) {
            $user3 = $game->player3->user;
        }
        if($game->player4) {
            $user4 = $game->player4->user;
        }

        return response()->json([
            'game' => $game,
            'board_id' => $game->board_id,
            'currentPlayer' => $game->current_player,
            'playersCount' => $game->players()->count(),
            'user_1' => $user1,
            'user_2' => $user2,
            'user_3' => $user3,
            'user_4' => $user4,
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
            foreach($game->players() as $player){

                $playerToDelete = Player::findOrFail($player->id);
                $game->removePlayer($playerToDelete->id);
                $game->save();
                $playerToDelete->delete();

            }
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
