@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3>Просмотр всех клиентов</h3>
        <div class="students">
            @foreach($clients as $item)
                <p>
                    Заказчик: <span>{{ $item->client }}</span>

                    @if($item->source)
                    Источник: <span>{{ $item->source }}</span>
                    @else
                    Источник не указан
                    @endif

                    @if($item->address)
                    Адрес: <span>{{ $item->address }}</span>
                    @else
                        Адрес не указан
                    @endif

                    @if($item->phone)
                    Телефон: <span>{{ $item->phone }}</span>
                    @else
                        Телефон не указана
                    @endif

                    @if($item->sum)
                    Сумма: <span>{{ $item->sum }}</span>
                    @else
                        Сумма не указан
                    @endif

                    @if($item->comment)
                    Комментарий: <span>{{ $item->comment }}</span>
                    @else
                        Комментарий не указан
                    @endif
                </p>
                <div class="students__buttons-group flex">
                    <a href="{{ route('admin.client.edit', $item->id) }}" class="btn btn-success">Редактировать</a>
                    <form action="{{ route('admin.client.delete', $item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="protocol" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
