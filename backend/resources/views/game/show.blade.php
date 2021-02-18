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

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

            <form action="{{ route('comment.store') }}" method="POST" class="mb-4">
                @csrf
                <input
                    name="game_id"
                    type="hidden"
                    value="{{ $game->id }}"
                >

                <div class="form-group">
                    <label for="name">
                        名前
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{old('name')}}"
                        class="form-control"
                    >
                </div>

                <div class="form-group">
                    <label for="text">
                        コメント
                    </label>
                    <textarea
                        id="text"
                        name="text"
                        class="form-control"
                    >{{ old('text')}}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        コメントする
                    </button>
                </div>
            </form>


            
                @foreach($comments as $comment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $comment->created_at->format('Y.m.d H:i') }}
                    </time>
                    <p class="mt-2">
                        {!! nl2br(e($comment->text)) !!}
                    </p>
                </div>
                @endforeach
            
                <p>コメントはまだありません</p>
            
        </section>
    </div>
</div>
@endsection