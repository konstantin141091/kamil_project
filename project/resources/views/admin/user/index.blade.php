@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3 class="h3-mobile">Просмотр всех админов</h3>
        <div class="students">
            @foreach($users as $item)
                <p>
                    Логин: <span>{{ $item->name }}</span>
                    Email: <span>{{ $item->email }}</span>
                </p>
                <div class="students__buttons-group flex">
                    <form action="{{ route('admin.user.delete', $item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
                <hr>
            @endforeach
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
