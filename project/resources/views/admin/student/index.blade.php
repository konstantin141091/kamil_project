@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3>Просмотр всего реестра</h3>
        <div class="students">
            @foreach($students as $item)
                <p>
                    Имя: <span>{{ $item->name }}</span>
                    Фамилия: <span>{{ $item->surname }}</span>
                    Отчество: <span>{{ $item->patronymic }}</span>
                    Протокол: <span>{{ $item->protocol }}</span>
                </p>
            <div class="students__buttons-group flex">
                <a href="{{ route('admin.student.show', $item->protocol) }}" class="btn btn-primary">Подробнее</a>
                <a href="{{ route('admin.student.edit', $item->protocol) }}" class="btn btn-success">Редактировать</a>
                <form action="{{ route('admin.student.delete', $item->protocol) }}" method="post">
                    @csrf
                    <input type="hidden" name="protocol" value="{{ $item->protocol }}">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            <hr>
            @endforeach
                <div>
                    {{ $students->links() }}
                </div>
        </div>
    </div>
@endsection
