@extends('layouts.app')

@section('content')

<h1>新規作成</h1>

<form action="{{ route('game.store') }}" method="POST" id="new">
  @csrf

  <div>
    <label>ボードゲーム名</label><br />
    <input type="text" name="name" value="{{old('name')}}">
  </div>

  <div>
    <label>商品画像</label><br />
    <input type='file' name="image" accept="image/png, image/jpeg">
  </div>

  <div>
    <label>商品説明</label><br />
    <textarea id="new" name="describe" value="{{old('describe')}}"></textarea>
  </div>

  <div>
    <label>プレイ時間</label><br />
    <input type="number" name="play_time" value="{{old('play_time')}}">
  </div>

  <div>
    <label>最小プレイ人数</label><br />
    <input type="number" name="players_minimum" value="{{old('player_minimum')}}">
  </div>

  <div>
    <label>最大プレイ人数</label><br />
    <input type="text" name="players_max" value="{{old('player_max')}}">
  </div>

  <input type="submit" value="登録する">

</form>
@endsection