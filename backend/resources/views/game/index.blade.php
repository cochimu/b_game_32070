@extends('common.common')

<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">B_GAME</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('my.index') }}">
                                      mypage
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            @if (session('success'))
                <div class="alert alert-primary mx-auto" style="width: 300px;" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container">
                <div class="masthead-subheading">Welcome To B_GAME!</div>
                <div class="masthead-heading text-uppercase">ボードゲーム好きは集まれ</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{ route('game.create') }}">投稿する</a>
            </div>
        </header>

        <!--新着一覧-->
        
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">新着ボードゲーム</h2>
                    <h3 class="section-subheading text-muted">Find fun For you</h3>
                </div>
                
                <div class="row">
                    @foreach($games as $game)
                    @if($game->image_path)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item" style="text-align:center">
                            <a class="portfolio-link" href="{{ route('game.show', $game->id) }}">
                                <img src="{{ $game->image_path }}" height="200" width="200">
                            </a>
                            <div class="portfolio-caption" style="margin-top:10px">
                                <div class="portfolio-caption-heading">{{ $game->name }}</div>
                                <div class="portfolio-caption-subheading text-muted">プレイ時間：{{ $game->play_time }}分</div>
                                <div class="portfolio-caption-subheading text-muted">人数：{{ $game->players_minimum }}~{{ $game->players_max }}人</div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © B_GAME 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
<body>