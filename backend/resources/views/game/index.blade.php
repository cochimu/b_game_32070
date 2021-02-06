@extends('layouts.app')

@section('content')
  <div class="top-box">
    <div class="image-box">
      <img src="image/top.jpg" alt="トップ画像" width="100%" height="500px">
    </div>
  </div>

  <div class="search-box">

  </div>

  <div class="add-box">
    <a href="{{ route('game.create') }}" class="add-btn">
      投稿
    </a>
  </div>


  @foreach($games as $game)
    @if($game->image_path)
      <div class="game-lists">
        <img src="{{ $game->image_path }}">
      </div>
    @endif
  @endforeach
@endsection