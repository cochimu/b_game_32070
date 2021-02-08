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

  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ボードゲーム名</th>
          <th>プレイ時間</th>
          <th>最小プレイ人数</th>
          <th>最大プレイ人数</th>
          <th>画像</th>
          <th>詳細</th>
        </tr>
      </thead>
      <tbody id="tb1">
      @foreach($games as $game)
      @if($game->image_path)
        <tr>
          <td>{{ $game->name }}</td>
          <td>{{ $game->play_time }}</td>
          <td>{{ $game->players_minimum }}</td>
          <td>{{ $game->players_max }}</td>
          <td><img src="{{ $game->image_path }}"></td>
          <td class="text-nowrap">
            <p><a href="{{ route('game.show', $game->id) }}" class="btn btn-primary btn-sm">詳細</a></p>
          </td>
        </tr>
      @endif
      @endforeach
      </tbody>
    </table>
  </div>
@endsection