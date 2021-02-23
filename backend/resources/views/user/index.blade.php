@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">{{ $user->name }}</h1>
            
        <section>
            <h2 class="h5 mb-4" style="margin-top:10px">
                投稿一覧
            </h2>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ボードゲーム名</th>
                        <th>プレイ時間</th>
                        <th>プレイ人数</th>
                        <th>詳細</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($games)
                        @foreach($games as $game)
                        @if ($game->user_id == $user->id)
                            <tr>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->play_time }}分</td>
                                <td>{{ $game->players_minimum }}~{{ $game->players_max }}人</td>
                                <td><a class="portfolio-link" href="{{ route('game.show', $game->id) }}">詳細</a></td>
                            </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

@endsection