@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3 class="h3-mobile">Поиск в реестре</h3>
        <form action="{{ route('admin.student.find') }}" class="admin__form mb-lg-2" method="post">
                @csrf
                <div class="form-row mb-lg-2">
                    <div class="col">
                        <input class="form-control" type="text" name="protocol_find" placeholder="Номер протокола" value="{{ old('protocol_find') }}">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="surname_find" placeholder="Фамилия" value="{{ old('surname_find') }}">
                    </div>
                </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary mt-3">Поиск</button>
            </div>

            </form>
        <hr>
        <h3 class="h3-mobile">Просмотр всего реестра</h3>
        <div class="students">
            @foreach($students as $item)
                <p>
                    {{ $item->surname }}
                    {{ $item->name }}
                    {{ $item->patronymic }}
                    <span>Протокол:</span> {{ $item->protocol }}
                    <span>Дата окончания:</span> {{ $item->finish_education }}
                </p>
            <div class="students__buttons-group flex">
                <a href="{{ route('admin.student.show', $item->id) }}" class="btn btn-primary">Подробнее</a>
                <a href="{{ route('admin.student.edit', $item->id) }}" class="btn btn-success">Редактировать</a>
                <form action="{{ route('admin.student.delete', $item->id) }}" method="post">
                    @csrf
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
