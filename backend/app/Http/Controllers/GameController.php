<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('game.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only('user_id', 'name', 'describe', 'play_time', 'players_minimum', 'players_max');
        
        $game = new Game();
        $game->user_id = $input["user_id"];
        $game->name = $input["name"];
        $game->describe = $input["describe"];
        $game->play_time = $input["play_time"];
        $game->players_minimum = $input["players_minimum"];
        $game->players_max = $input["players_max"];
        $game->save();

        return redirect('games/index');

        /*$game = new Game;
        $form = $request->all();

        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/', $image, 'public');
        $post->file_path = Storage::disk('s3')->url($path);
        $post->save();
        return redirect('games/index');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
        return view('game.show');
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
