@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Админ панель сервиса.</h2>
        @if(session('error'))
            <p>{{ session('error') }}</p>
        @endif
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <h3>Одиночное добавление записи</h3>
        <form action="{{ route('admin.create') }}" method="post">
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="surname" name="surname">
            <input type="text" placeholder="patronymic" name="patronymic">
            <input type="date" placeholder="finish_education" name="finish_education">
            <input type="text" placeholder="discharge" name="discharge">
            <input type="text" placeholder="certificates" name="certificates">
            <input type="text" placeholder="evidence" name="evidence">
            <input type="text" placeholder="protocol" name="protocol">

            <button type="submit">Добавить</button>
        </form>

        <h3>Добавление записей таблицей excel</h3>

        <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel">
            <button type="submit">Загрузить</button>
        </form>

        <h3>Выгрузить записи таблицей excel</h3>
        <a href="{{ route('admin.export') }}">Выгрузить</a>
    </div>
@endsection
