@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3>Редактировать запись студента</h3>
        <div class="find">
            <form action="{{ route('admin.student.update', $student->protocol) }}" method="post" class="find__form">
                @csrf
                <label for="name">Имя</label>
                <input type="text" name="name" placeholder="Имя" id="name"
                       @if(old('name'))
                       value="{{ old('name') }}"
                       @else
                       value="{{ $student->name }}"
                        @endif>
                @if($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('name') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <label for="surname">Фамилия</label>
                <input type="text" name="surname" placeholder="Фамилия" id="surname"
                       @if(old('surname'))
                       value="{{ old('surname') }}"
                       @else
                       value="{{ $student->surname }}"
                        @endif>
                @if($errors->has('surname'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('surname') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <label for="patronymic">Отчество</label>
                <input type="text" name="patronymic" placeholder="Отчество" id="patronymic"
                       @if(old('patronymic'))
                       value="{{ old('patronymic') }}"
                       @else
                       value="{{ $student->patronymic }}"
                        @endif>
                @if($errors->has('patronymic'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('patronymic') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <label for="finish_education">Дата окончания обучения</label>
                <input type="date" name="finish_education" placeholder="Дата окончания" id="finish_education"
                       @if(old('finish_education'))
                       value="{{ old('finish_education') }}"
                       @else
                       value="{{ $student->finish_education }}"
                        @endif>
                @if($errors->has('finish_education'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('finish_education') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <label for="discharge">Разряд</label>
                <input type="text" name="discharge" placeholder="Разряд" id="discharge"
                       @if(old('discharge'))
                       value="{{ old('discharge') }}"
                       @else
                       value="{{ $student->discharge }}"
                        @endif>
                @if($errors->has('discharge'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('discharge') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <label for="certificates">Серитификат</label>
                <input type="text" name="certificates" placeholder="Серитификат" id="certificates"
                       @if(old('certificates'))
                       value="{{ old('certificates') }}"
                       @else
                       value="{{ $student->certificates }}"
                        @endif>
                @if($errors->has('certificates'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('certificates') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <label for="evidence">Свидетельство</label>
                <input type="text" name="evidence" placeholder="Свидетельство" id="evidence"
                       @if(old('evidence'))
                       value="{{ old('evidence') }}"
                       @else
                       value="{{ $student->evidence }}"
                        @endif>
                @if($errors->has('evidence'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('evidence') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <label for="protocol">Протокол</label>
                <input type="text" name="protocol" placeholder="Протокол" id="protocol"
                       @if(old('protocol'))
                       value="{{ old('protocol') }}"
                       @else
                       value="{{ $student->protocol }}"
                        @endif>
                @if($errors->has('protocol'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('protocol') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </form>
            <hr>
        </div>
        <form action="{{ route('admin.student.delete', $student->protocol) }}" method="post">
            @csrf
            <input type="hidden" name="protocol" value="{{ $student->protocol }}">
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
