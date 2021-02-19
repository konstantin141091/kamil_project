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

        <h3>Добавление записей таблицей excel</h3>

        <form action="{{ route('admin.student.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel">
            <button type="submit" >Загрузить</button>
        </form>

        <h3>Выгрузить записи таблицей excel</h3>
        <a href="{{ route('admin.student.export') }}">Выгрузить</a>
        <h3>Просмотр всего реестра</h3>
        <a href="{{ route('admin.student.index') }}">Посмотреть</a>
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
            <input type="number" placeholder="+79145145151" name="phone" value="{{ old('phone') }}">
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

    </div>
@endsection
