@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 find__form">
                <h2 class="w-100">Поиск по ФИО</h2>
                <form action="{{ route('service.findByName') }}" method="post">
                    @csrf
                    <input type="text" name="surname" placeholder="Фамилия" value="{{ old('surname') }}"> <br>
                    @if($errors->has('surname'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('surname') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                    <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}"> <br>
                    @if($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('name') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                    <input type="text" name="patronymic" placeholder="Отчество" value="{{ old('patronymic') }}"> <br>
                    @if($errors->has('patronymic'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('patronymic') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Найти</button>
                </form>
            </div>
            <div class="col-md-6 find__form">
                <h2 class="w-100">Поиск по номеру протокола</h2>
                <form action="{{ route('service.findByProtocol') }}" method="post">
                    @csrf
                    <input type="text" name="protocol" placeholder="Номер протокола" value="{{ old('protocol') }}"> <br>
                    @if($errors->has('protocol'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('protocol') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Найти</button>
                </form>
            </div>
        </div>
        @if(session('error'))
            <hr>
            <h3 class="w-100">{{ session('error') }}</h3>
        @endif
        @if(session('students'))
            <hr>
            <h3 class="w-100">Результат</h3>
            <div class="find__answer">
                @foreach(session('students') as $item)
                    <p>Имя: <span>{{ $item->name }}</span></p>
                    <p>Фамилия: <span>{{ $item->surname }}</span></p>
                    <p>Отчество: <span>{{ $item->patronymic }}</span></p>
                    <p>Дата выдачи: <span>{{ $item->finish_education }}</span></p>
                    <p>Разряд: <span>{{ $item->discharge }}</span></p>
                    <p>Сертификата: <span>{{ $item->certificates }}</span></p>
                    <p>Свидетельство: <span>{{ $item->evidence }}</span></p>
                    <p>Протокол: <span>{{ $item->protocol }}</span></p>
                    <hr>
                @endforeach
            </div>
        @endif
        <div class="row">

        </div>
    </div>
@endsection
