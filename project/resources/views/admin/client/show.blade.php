@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3>Данные записи клиента</h3>
            @foreach($clients as $client)
                <div class="find__answer">
                    <p>Клиент: <span>{{ $client->client }}</span></p>

                    <p>Источник:
                        <span>
                        @if($client->source)
                        {{ $client->source }}
                            @else
                            не заполнен
                            @endif
                        </span>
                    </p>
                    <p>Комментарий:
                        <span>
                        @if($client->comment)
                                {{ $client->comment }}
                            @else
                                не заполнен
                            @endif
                        </span>
                    </p>
                    <p>Адресс:
                        <span>
                        @if($client->adress)
                                {{ $client->adress }}
                            @else
                                не заполнен
                            @endif
                        </span>
                    </p>
                    <p>Телефон:
                        <span>
                        @if($client->phone)
                                {{ $client->phone }}
                            @else
                                не заполнен
                            @endif
                        </span>
                    </p>
                    <p>Сумма:
                        <span>
                        @if($client->sum)
                                {{ $client->sum }}
                            @else
                                не заполнен
                            @endif
                        </span>
                    </p>
                </div>
                <div class="students__buttons-group">
                    <a href="{{ route('admin.client.edit', $client->id) }}" class="btn btn-success">Редактировать</a>
                    <form action="{{ route('admin.client.delete', $client->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="protocol" value="{{ $client->id }}">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
                <hr>
            @endforeach


    </div>
@endsection
