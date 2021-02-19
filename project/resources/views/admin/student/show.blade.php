@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3>Данные записи студента</h3>
       <div class="find__answer">
           <p>Имя: <span>{{ $student->name }}</span></p>
           <p>Фамилия: <span>{{ $student->surname }}</span></p>
           <p>Отчество: <span>{{ $student->patronymic }}</span></p>
           <p>Дата выдачи: <span>{{ $student->finish_education }}</span></p>
           <p>Разряд: <span>{{ $student->discharge }}</span></p>
           <p>Сертификата: <span>{{ $student->certificates }}</span></p>
           <p>Свидетельство: <span>{{ $student->evidence }}</span></p>
           <p>Протокол: <span>{{ $student->protocol }}</span></p>
           <hr>
       </div>
        <div class="students__buttons-group">
            <a href="{{ route('admin.student.edit', $student->protocol) }}" class="btn btn-success">Редактировать</a>
            <form action="{{ route('admin.student.delete', $student->protocol) }}" method="post">
                @csrf
                <input type="hidden" name="protocol" value="{{ $student->protocol }}">
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>

    </div>
@endsection
