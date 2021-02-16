@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Результат</p>
        @foreach($students as $item)
            <p>{{ $item->name }}</p>
            <p>{{ $item->surname }}</p>
            <p>{{ $item->patronymic }}</p>
            <p>{{ $item->finish_education }}</p>
            <p>{{ $item->discharge }}</p>
            <p>{{ $item->certificates }}</p>
            <p>{{ $item->evidence }}</p>
            <p>{{ $item->protocol }}</p>
        @endforeach
    </div>
@endsection
