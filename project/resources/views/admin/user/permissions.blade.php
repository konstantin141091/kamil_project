@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3 class="h3-mobile">Редактировать права администратора</h3>
            <ul class="list-group">
                <li class="list-group-item" style="font-size: 20px">Имя: {{ $user->name }} Email: {{ $user->email }}</li>
            </ul>
        <div class="find">
            <form action="{{ route('admin.user.permission_update', $user) }}" method="POST" class="find__form">
                @csrf

                @foreach($permissions as $permission)
                    @php
                        $check = false;
                        if (!is_null($user_permissions->where('permission_id', '=', $permission->id)->first())) {
                            $check = true;
                        }
                    @endphp
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck-{{ $permission->id }}" name="permission-{{ $permission->id }}" value="{{ $permission->id }}" @if($check) checked @endif>
                            <label class="form-check-label" for="gridCheck-{{ $permission->id }}">
                                {{ $permission->title }}
                            </label>
                        </div>
                    </div>
                    <hr>
                @endforeach

                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
            <hr>
        </div>
    </div>
@endsection
