<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * トップページ表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        
    }

    /**
     * 投稿画面表示
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add()
    {
        Game::create([
            'user_id' => Auth::id(),
            'name' => '',
            'describe' => '',
            'play_time' => '',
            'players_minimum' => '',
            'players_max' => '',

        ]);

        return view('form');
    }
}
