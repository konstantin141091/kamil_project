@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="w-100">Поиск по реестру</h2>
        <form action="{{ route('service.find') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col">
                    <input class="form-control" type="text" name="surname" placeholder="Фамилия" value="{{ old('surname') }}"> <br>
                    @if($errors->has('surname'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('surname') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="name" placeholder="Имя" value="{{ old('name') }}"> <br>
                    @if($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('name') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input class="form-control" type="text" name="patronymic" placeholder="Отчество" value="{{ old('patronymic') }}"> <br>
                    @if($errors->has('patronymic'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('patronymic') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="protocol" placeholder="№ протокола" value="{{ old('protocol') }}"> <br>
                    @if($errors->has('protocol'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('protocol') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    @if($browser != 'Safari')
                    <input id="inputDate" class="form-control find__form-date placeholder datechk" type="date" name="finish_education"
                           placeholder="Дата окончания обучения: " value="{{ old('finish_education') }}"
                           onchange="this.className=(this.value!=''?'form-control has-value find__form-date placeholder':
                           'form-control find__form-date placeholder')"> <br>
                    @else
                    <datepicker name="finish_education" placeholder="Дата окончания" format="dd-MM-yyyy" value="{{ old('finish_education') }}"
                                input-class="form-control find__form-date back-fff mb-4" :language="ru">

                    </datepicker>
                    @endif
                    @if($errors->has('finish_education'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('finish_education') as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary">Найти</button>
            </div>
        </form>

{{--        Результаты поиска--}}
        @if(session('error'))
            <hr>
            <h3 class="w-100">{{ session('error') }}</h3>
        @endif
        @if(session('students'))
            <hr>
            <h3 class="w-100">Результат</h3>
            <div class="find__answer">
                @foreach(session('students') as $item)
                    <p>Протокол: <span>{{ $item->protocol }}</span></p>
                    <p>Фамилия: <span>{{ $item->surname }}</span></p>
                    <p>Имя: <span>{{ $item->name }}</span></p>
                    <p>Отчество: <span>{{ $item->patronymic }}</span></p>
                    <p>Дата выдачи: <span>{{ $item->finish_education }}</span></p>

                    <p>Разряд: <span>
                            @if($item->discharge)
                                {{ $item->discharge }}
                            @else
                                запись отсутствует
                            @endif
                                </span></p>

                    <p>Удостоверение: <span>
                            @if($item->certificates)
                                {{ $item->certificates }}
                            @else
                                запись отсутствует
                            @endif
                                </span></p>
                    <p>Свидетельство: <span>
                            @if($item->evidence)
                                {{ $item->evidence }}
                            @else
                                запись отсутствует
                            @endif
                                </span></p>
                    <p>Квалификация: <span>
                            @if($item->qualification)
                                {{ $item->qualification }}
                            @else
                                запись отсутствует
                            @endif
                                </span></p>

                    <hr>
                @endforeach
            </div>
        @endif
    </div>
@endsection
