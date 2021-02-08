@extends('common.common')

<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="public/img/navbar-logo.svg" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
          <img src="public/img/top.jpg" alt="" />
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
            </div>
        </header>

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
  
</body>