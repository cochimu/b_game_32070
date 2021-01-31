@extends('layouts.app')

@section('content')

<h1>新規作成</h1>

<form action="{{ route('game.store') }}" method="POST" id="new">
  @csrf
  <P>名前：<input type="text" name="name" value="{{old('name')}}"></p>
  <p>商品説明：<textarea id="new" name="describe" value="{{old('describe')}}"></textarea></p>
  <p>プレイ時間：<input type="number" name="play_time" value="{{old('play_time')}}"></p>
  <p>最小プレイ人数：<input type="number" name="player_minimum" value="{{old('player_minimum')}}"></p>
  <p>最大プレイ人数：<input type="text" name="player_max" value="{{old('player_max')}}"></p>
  <input type="submit" value="登録する">
</form>
@endsection