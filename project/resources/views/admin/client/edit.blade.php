@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3>Редактировать запись клиента</h3>
        <div class="find">
            <form action="{{ route('admin.client.update', $client->id) }}" method="post" class="find__form">
                @csrf
                <label for="client">Заказчик</label>
                <input type="text" name="client" placeholder="Заказчик" id="client"
                       @if(old('client'))
                       value="{{ old('client') }}"
                       @else
                       value="{{ $client->client }}"
                        @endif>
                @if($errors->has('client'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('client') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="source">Источник</label>
                <input type="text" name="source" placeholder="Источник" id="source"
                       @if(old('source'))
                       value="{{ old('source') }}"
                       @else
                       value="{{ $client->source }}"
                        @endif>
                @if($errors->has('source'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('source') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="address">Адрес</label>
                <input type="text" name="address" placeholder="Адрес" id="address"
                       @if(old('address'))
                       value="{{ old('address') }}"
                       @else
                       value="{{ $client->address }}"
                        @endif>
                @if($errors->has('address'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('address') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="phone">Телефон</label>
                <input type="number" name="phone" placeholder="Телефон" id="phone"
                       @if(old('phone'))
                       value="{{ old('phone') }}"
                       @else
                       value="{{ $client->phone }}"
                        @endif>
                @if($errors->has('phone'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('phone') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="sum">Сумма</label>
                <input type="number" name="sum" placeholder="Сумма" id="sum"
                       @if(old('sum'))
                       value="{{ old('sum') }}"
                       @else
                       value="{{ $client->sum }}"
                        @endif>
                @if($errors->has('sum'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('sum') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="comment">Комментарий</label>
                <input type="text" name="comment" placeholder="Комментарий" id="comment"
                       @if(old('comment'))
                       value="{{ old('comment') }}"
                       @else
                       value="{{ $client->comment }}"
                        @endif>
                @if($errors->has('comment'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('comment') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </form>
            <hr>
        </div>
        <form action="{{ route('admin.student.delete', $client->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $client->id }}">
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
