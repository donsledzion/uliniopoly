<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Models\Board;
use App\Models\Field;
use App\Models\Game;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PHPUnit\Exception;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $boards = Board::all();
        return view('boards.index',[
            'boards' => $boards,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        $fields = Field::all();
        return view('boards.create',[
            'fields' =>$fields,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirector
     */
    public function store(BoardRequest $request)
    {
        try{
            $attributes = $request->validated();
            $board = Board::create($attributes);
            for($i = 1 ; $i < 41 ; $i++){
                if(Arr::has($attributes,'slot_'.$i)){
                    $board->slots()->attach($i,['field_id' => $attributes['slot_'.$i] ]);
                    error_log("=================================================") ;
                    error_log("Mamy To!". $attributes['slot_'.$i]);
                } else {
                    $board->slots()->attach($i);
                }
            }
            error_log("=================================================") ;
            $board->save();



            return redirect(route('boards.index'));
        }catch(Exception $e){
            Log::error('Exception thrown while storing new board: '.$e->getMessage());
            return redirect(route('boards.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return View
     */
    public function show(Board $board):View
    {
        return view('boards.show',[
            'board' => $board
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return View
     */
    public function edit(Board $board)
    {
        try {
            return view('boards.edit',[
                'board' => $board,
            ]);
        } catch(\Exception $e) {
            Log::error("Exception thrown on attempt to edit board: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BoardRequest  $request
     * @param  Board  $board
     * @return RedirectResponse|View
     */
    public function update(BoardRequest $request, Board $board)
    {
        try {
            $board->fill($request->validated())->save();
            return Redirect::route('boards.index');
        } catch(\Exception $e){
            Log::error('An exception thrown while updating Board: '.$e->getMessage());
            return view('error',[
                'error' => $e->getMessage()
            ]);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return JsonResponse
     */
    public function destroy(Board $board):JsonResponse
    {
        try{
            $board = Board::findOrFail($board->id);
            error_log("DELETING!!!");
            error_log("======================================================");
            $board->slots()->detach();
            $board->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Board removed successfully!',
            ]);
        } catch(\Exception $e){
            Log::error("Exception thrown while deleting Board: ".$e->getMessage());
            return response()->json([
                'status' => 'fail',
                'message' => 'Board not removed. Error: '.$e->getMessage(),
            ]);
        }
    }
}
