<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Учебный цент дистанционого обучения Профессионал предоставляем качественные услуги дистанционого обучения по многим профессиям">
    <meta name="keywords" content="профессионал, дистанционое обучение, получить профессию">

    <title>Учебный центр дистанционого обучения | Профессионал</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/vuejs-datepicker/dist/locale/translations/ru.js"></script>

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
                <button class="navbar-toggler" style="border-color: #ffffff!important;" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item header__li
                        @if(Route::current()->getName() == 'index')
                                header__active
                        @endif
                        ">
                            <a class="nav-link header__link" href="{{ route('index') }}">
                                Главная
                            </a>
                        </li>
                        <li class="nav-item header__li
                        @if(Route::current()->getName() == 'service.index')
                                header__active
                        @endif">
                            <a class="nav-link header__link" href="{{ route('service.index') }}">Поиск в реестре</a>
                        </li>
                        @auth
                            <li class="nav-item header__li
                            @switch(Route::current()->getName())
                            @case('admin.index')
                                    header__active
                            @break
                            @case('admin.student.index')
                                    header__active
                            @break
                            @case('admin.student.show')
                                    header__active
                            @break
                            @case('admin.student.edit')
                                    header__active
                            @break
                            @case('admin.user.index')
                                    header__active
                            @break
                            @default
                            @endswitch

                            ">
                                <a class="nav-link header__link" href="{{ route('admin.index') }}">Панель админа</a>
                            </li>
                            <li class="nav-item header__li
                            @if(Route::current()->getName() == 'admin.instruction')
                                    header__active
                            @endif">
                                <a class="nav-link header__link" href="{{ route('admin.instruction') }}">Инструкция админа</a>
                            </li>
                        @endauth

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item header__li">
                                <a class="nav-link header__link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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
