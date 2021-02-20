@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Админ панель сервиса.</h2>
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

{{--        Работа с реестром--}}
        <h3>Одиночное добавление записи в реестр</h3>
        <form action="{{ route('admin.student.create') }}" method="post">
            @csrf
            <input type="text" placeholder="name" name="name" value="{{ old('name') }}">
            <input type="text" placeholder="surname" name="surname" value="{{ old('surname') }}">
            <input type="text" placeholder="patronymic" name="patronymic" value="{{ old('patronymic') }}">
            <input type="date" placeholder="finish_education" name="finish_education" value="{{ old('finish_education') }}">
            <input type="text" placeholder="discharge" name="discharge" value="{{ old('discharge') }}">
            <input type="text" placeholder="certificates" name="certificates" value="{{ old('certificates') }}">
            <input type="text" placeholder="evidence" name="evidence" value="{{ old('evidence') }}">
            <input type="text" placeholder="protocol" name="protocol" value="{{ old('protocol') }}">

            <button type="submit">Добавить</button>
        </form>

        <h3>Добавление в реестр записей таблицей excel</h3>

        <form action="{{ route('admin.student.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="students">
            <button type="submit" >Загрузить</button>
        </form>

        <h3>Выгрузить записи таблицей excel</h3>
        <a href="{{ route('admin.student.export') }}">Выгрузить</a>
        <h3>Поиск в реестре по номеру протокола</h3>
        <form action="{{ route('admin.student.find') }}" class="find__form" method="post">
            @csrf
            <input type="text" name="protocol_find" placeholder="Номер протокола" value="{{ old('protocol_find') }}">
            <button type="submit" class="btn btn-primary">Поиск</button>
        </form>
        <h3>Просмотр всего реестра</h3>
        <a href="{{ route('admin.student.index') }}">Посмотреть</a>
        <hr>
{{--        Работа с базой клиентов--}}
        <h3>База клиентов</h3>
        <h3>Одиночное добавление записи в базу клиентов</h3>
        <form action="{{ route('admin.client.create') }}" method="post">
            @csrf
            <input type="text" placeholder="Заказчик" name="client" value="{{ old('client') }}">
            @if($errors->has('client'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('client') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" placeholder="Источник" name="source" value="{{ old('source') }}">
            @if($errors->has('source'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('source') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" placeholder="Адрес" name="address" value="{{ old('address') }}">
            @if($errors->has('address'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('address') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="text" placeholder="Комментарий" name="comment" value="{{ old('comment') }}">
            @if($errors->has('comment'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('comment') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="number" placeholder="79145145151" name="phone" value="{{ old('phone') }}">
            @if($errors->has('phone'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('phone') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <input type="number" placeholder="Сумма" name="sum" value="{{ old('sum') }}">
            @if($errors->has('sum'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('sum') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            <button type="submit">Добавить</button>
        </form>
        <h3>Просмотр всей базы клиентов</h3>
        <a href="{{ route('admin.client.index') }}">Посмотреть</a>
        <h3>Поиск клиента по имени</h3>
        <form action="{{ route('admin.client.find') }}" class="find__form" method="post">
            @csrf
            <input type="text" name="client_find" placeholder="Клиент" value="{{ old('client_find') }}">
            <button type="submit" class="btn btn-primary">Найти</button>
        </form>
        <h3>Добавление клиентов таблицей excel</h3>
        <form action="{{ route('admin.client.import') }}" class="find__form" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="clients" placeholder="Файл excel">
            <button type="submit" class="btn btn-primary">Загрузить</button>
        </form>
        <h3>Выгрузить базу клиентов</h3>
        <a href="{{ route('admin.client.export') }}">Выгрузить</a>
        <hr>

{{--        Работа с админами--}}
        @if(Auth::user()->is_admin)
            <h3>Упраление админами</h3>
            <h3>Добавить админа</h3>
            <form action="{{ route('admin.user.create') }}" class="find__form" method="post">
                @csrf
                <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('name') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('email') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <input type="password" name="password" placeholder="Пароль" value="{{ old('password') }}">
                @if($errors->has('password'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('password') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <input type="password" name="password_confirmation" placeholder="Повторите пароль" value="{{ old('password') }}">

                <button type="submit" class="btn btn-primary">Создать</button>

            </form>

            <h3>Просмотр всех админов сайта</h3>
            <a href="{{ route('admin.user.index') }}">Просмотр</a>
        @endif
    </div>
@endsection
