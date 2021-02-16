@extends('layouts.app')

@section('content')

<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-primary mx-auto" style="width: 300px;" role="alert">
            {{ session('success') }}
        </div>
    @endif
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
            <form
                style="display: inline-block;"
                method="POST"
                action="{{ route('game.destroy', $game->id) }}"
                >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">削除する</button>
            </form>
        </div>
    </div>

    <div class="border p-4" style="margin-top:10px">
        <div class="row">
            <fieldset class="mb-4">
                <form action="{{ route('game.comments.store', $game->id) }}" method="POST" id="comment">
                    @csrf

                    <input
                        name="game_id"
                        type="hidden"
                        value="{{ $game->id }}"
                    >

                    <div class="form-group">
                        <label for="body">
                            {{ $user }}
                        </label>
                        <textarea
                            id="comment"
                            name="comment"
                            class="form-control"
                            rows="2"
                        >{{ old('comment') }}</textarea>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                    </div>
                </form>
             </fieldset>
        </div>
    </div>

    <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>
    </section>
</div>

@endsection