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
                    @include('admin._templates._delete_group', [
                        'id' => $item->id,
                        'title' => $item->name,
                        'route' => 'admin.user.delete'
                    ])
                </div>
                <div class="students__buttons-group flex mt-3">
                    <a href="{{ route('admin.user.permission_edit', $item) }}" class="btn btn-info">Права доступа</a>
                </div>
                <hr>
            @endforeach
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
