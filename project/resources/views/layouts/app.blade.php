<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Учебный цент дистанционого обучения Профессионал предоставляем качественные услуги дистанционого обучения по многим профессиям">
    <meta name="keywords" content="профессионал, дистанционое обучение, получить профессию">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container header__top">
                <a class="navbar-brand logo" href="{{ route('index') }}">
                    <img src="{{ asset("storage/images/logo-ch.png") }}" alt="Профессионал">
                    <p>АНО ДПО УЦ<br><span>ПРОФЕССИОНАЛ</span></p>
                </a>

                <div class="header__contacts d-flex">
                    <div class="header__phone d-flex align-items-center">
                        <img src="{{ asset("storage/images/phone-icon.svg") }}" alt="phone">
                        <p>8(351) 277-90-06</p>
                    </div>
                    <div class="header__email d-flex align-items-center">
                        <img src="{{ asset("storage/images/email-icon.svg") }}" alt="email">
                        <p>dpoprofessional.kurs@gmail.com</p>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light header">


            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item header__li">
                            <a class="nav-link header__link" href="{{ route('index') }}">Главная <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item header__li">
                            <a class="nav-link header__link" href="{{ route('service.index') }}">Поиск в реестре</a>
                        </li>
                        @auth
                            <li class="nav-item header__li">
                                <a class="nav-link header__link" href="{{ route('admin.index') }}">Панель админа</a>
                            </li>
                            <li class="nav-item header__li">
                                <a class="nav-link header__link" href="{{ route('admin.instruction') }}">Инструкция админа</a>
                            </li>
                        @endauth

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown header__li">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle header__link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
