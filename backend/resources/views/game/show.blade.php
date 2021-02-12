@extends('layouts.app')

@section('content')

<div class="container">
    <div class="border p-4">
        <div class="row">
            <div class="col-sm-6 col-lg-6" id="left-box" style="text-align:center">
                <img src="{{ $game->image_path }}" class="img-fluid">
            </div>
            <div class="col-sm-6 col-lg-6" id="right-box" style="text-align:center">
            <table class="table">
                <thead>
                    <tr>
                        <p class="font-weight-bold"><th>{{ $game->name }}</th></p>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $game->describe }}</td>
                    </tr>
                     <tr>
                         <td>{{ $game->play_time }}分</td>
                     </tr>
                     <tr>
                         <td>{{ $game->players_minimum}}~{{ $game->players_max}}人</td>
                     </th>
                </tbody>
            </table>
            </div>
        </div>
        <div class="mb-4 text-center" style="margin-top:10px">
            <a href="{{ route('game.edit', $game->id) }}" class="btn btn-primary">
            編集する
            </a>
            <a href="" class="btn btn-primary">
            削除する
            </a>
        </div>
    </div>
</div>

@endsection