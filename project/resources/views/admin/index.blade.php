@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

{{--        Работа с реестром--}}
            @if($admin->checkPermission(\App\Models\Permission::student_insert))
                @include('admin._blocks._student_create')
            @endif

            @if($admin->checkPermission(\App\Models\Permission::student_excel_import))
                @include('admin._blocks._student_import')
            @endif

            @if($admin->checkPermission(\App\Models\Permission::student_excel_export))
                @include('admin._blocks._student_export')
            @endif

            @if($admin->checkPermission(\App\Models\Permission::student_show))
                @include('admin._blocks._student_find')
            @endif


{{--        Работа с админами--}}
        @if(Auth::user()->is_admin)
            <h3 class="h3-mobile">Упраление админами</h3>
            <h3 class="h3-mobile">Добавить админа</h3>
            <form action="{{ route('admin.user.create') }}" method="post" class="admin__form">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('name') as $err)
                                    {{ $err }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('email') as $err)
                                    {{ $err }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="Пароль" value="{{ old('password') }}">
                        @if($errors->has('password'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('password') as $err)
                                    {{ $err }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль" value="{{ old('password') }}">
                    </div>
                </div>
                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
                <hr>
            <h3 class="h3-mobile">Просмотр всех админов сайта</h3>
            <div class="form-btn">
                <a href="{{ route('admin.user.index') }}" class="btn btn-success">Просмотр</a>
            </div>
        @endif
    </div>
@endsection
