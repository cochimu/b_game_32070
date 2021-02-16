<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
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
        return view('game.index', compact('games'));
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
        $input = $request->only('user_id', 'name', 'describe', 'play_time', 'players_minimum', 'players_max',  'image_path');
        

        $game = new Game();
        $game->user_id = Auth::id();
        $game->name = $input["name"];
        $game->describe = $input["describe"];
        $game->play_time = $input["play_time"];
        $game->players_minimum = $input["players_minimum"];
        $game->players_max = $input["players_max"];

        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('bgama32070', $image, 'public');
        $game->image_path = Storage::disk('s3')->url($path);

        $game->save();

        return redirect('/')->with('success', '投稿しました');

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
        $user = Auth::user();
        return view('game.show', compact('game','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);
        return view('game.edit', compact('game'));
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
        $game = Game::find($id);
        $game->user_id = Auth::id();
        $game->name = $request->input('name');
        $game->describe = $request->input('describe');
        $game->play_time = $request->input('play_time');
        $game->players_minimum = $request->input('players_minimum');
        $game->players_max = $request->input('players_max');

        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('bgama32070', $image, 'public');
        $game->image_path = Storage::disk('s3')->url($path);
        
        $game->save();

        return redirect('/')->with('success', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Game::where('id', $id)->delete();
        return redirect('/')->with('success', '削除しました');
    }
}
