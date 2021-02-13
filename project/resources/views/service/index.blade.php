@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(session('error'))
                <p>Ничего не нашли</p>
            @endif
            <h2>Поиск по ФИО</h2>
            <div class="col-md-8">
                <form action="{{ route('service.find') }}" method="post">
                    @csrf
                    <input type="text" name="surname" placeholder="Фамилия" value="{{ old('surname') }}">
                    <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}">
                    <input type="text" name="patronymic" placeholder="Отчество" value="{{ old('patronymic') }}">

                    <button type="submit">Найти</button>
                </form>
            </div>
        </div>
    </div>
@endsection
