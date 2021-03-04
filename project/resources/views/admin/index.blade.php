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
        <h3>Одиночное добавление записи в реестр</h3>
        <form action="{{ route('admin.student.create') }}" method="post" class="admin__form">
            @csrf
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Протокол" name="protocol" value="{{ old('protocol') }}">
                    @if($errors->has('protocol'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('protocol') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input type="text" class="form-control"  placeholder="Фамилия" name="surname" value="{{ old('surname') }}">
                    @if($errors->has('surname'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('surname') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control"  placeholder="Имя" name="name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('name') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input type="text" class="form-control"  placeholder="Отчество" name="patronymic" value="{{ old('patronymic') }}">
                    @if($errors->has('patronymic'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('patronymic') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Разряд" name="discharge" value="{{ old('discharge') }}">
                    @if($errors->has('discharge'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('discharge') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Свидетельство" name="evidence" value="{{ old('evidence') }}">
                    @if($errors->has('evidence'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('evidence') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control"  placeholder="Удостоверение" name="certificates" value="{{ old('certificates') }}">
                    @if($errors->has('certificates'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('certificates') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input type="date" class="form-control"  placeholder="Дата окончания: " name="finish_education" value="{{ old('finish_education') }}">
                    @if($errors->has('finish_education'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('finish_education') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Квалификация" name="qualification" value="{{ old('qualification') }}">
                    @if($errors->has('qualification'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('qualification') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Источник" name="source" value="{{ old('source') }}">
                    @if($errors->has('source'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('source') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Адрес" name="address" value="{{ old('address') }}">
                    @if($errors->has('address'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('address') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="79145689898" name="phone" value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('phone') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="number" class="form-control" placeholder="Сумма" name="sum" value="{{ old('sum') }}">
                    @if($errors->has('sum'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('sum') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Комментарий" name="comment" value="{{ old('comment') }}">
                    @if($errors->has('comment'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('comment') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
            <hr>
        <h3>Добавление в реестр записей таблицей excel</h3>

        <form action="{{ route('admin.student.import') }}" method="post" enctype="multipart/form-data" class="form-group">
            @csrf
            <label for="students">Загрузите файл excel соответствующий требованиям загрузки</label>
            <input type="file" name="students" class="form-control-file mb-lg-2" id="students" style="font-size: 20px">
            <button type="submit" class="btn btn-primary mt-3">Загрузить</button>
        </form>
            <hr>

        <h3>Выгрузить записи таблицей excel</h3>
        <a href="{{ route('admin.student.export') }}" class="btn btn-success mb-lg-2">Выгрузить</a>
            <hr>
        <h3>Поиск в реестре</h3>
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
            <button type="submit" class="btn btn-primary mt-3">Поиск</button>
        </form>
            <hr>
        <h3>Просмотр всего реестра</h3>
        <a href="{{ route('admin.student.index') }}" class="btn btn-success mb-lg-2">Посмотреть</a>
            <hr>
        @if(Auth::user()->is_admin)
            <drop-students-component :link="`{{ route('admin.student.deleteAll') }}`"></drop-students-component>
        @endif
        <hr>

{{--        Работа с админами--}}
        @if(Auth::user()->is_admin)
            <h3>Упраление админами</h3>
            <h3>Добавить админа</h3>
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
                <button type="submit" class="btn btn-primary">Создать</button>

            </form>
                <hr>
            <h3>Просмотр всех админов сайта</h3>
            <a href="{{ route('admin.user.index') }}" class="btn btn-success">Просмотр</a>
        @endif
    </div>
@endsection
