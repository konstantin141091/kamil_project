@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <h3 class="h3-mobile">Редактировать запись студента</h3>
        <div class="find">
            <form action="{{ route('admin.student.update', $student) }}" method="post" class="find__form">
                @csrf

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

                <label for="certificates">Удостоверение</label>
                <input type="text" name="certificates" placeholder="Удостоверение" id="certificates"
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

                <label for="finish_education">Дата окончания обучения</label>
                @if($browser != 'Safari')
                <input type="date" name="finish_education" placeholder="Дата окончания: " id="finish_education"
                       @if(old('finish_education'))
                       value="{{ old('finish_education') }}"
                       @else
                       value="{{ $student->finish_education }}"
                        @endif
                       onchange="this.className=(this.value!=''?'has-value datechk':'datechk')">
                @else
                <datepicker name="finish_education" placeholder="Дата окончания" format="yyyy-MM-dd"
                            @if(old('finish_education'))
                            value="{{ old('finish_education') }}"
                            @else
                            value="{{ $student->finish_education }}"
                            @endif
                            input-class="back-fff mb-4" :language="ru">

                </datepicker>
                @endif
                @if($errors->has('finish_education'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('finish_education') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="qualification">Квалификация</label>
                <input type="text" name="qualification" placeholder="Квалификация" id="qualification"
                       @if(old('qualification'))
                       value="{{ old('qualification') }}"
                       @else
                       value="{{ $student->qualification }}"
                        @endif>
                @if($errors->has('qualification'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('qualification') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="source">Источник</label>
                <input type="text" name="source" placeholder="Источник" id="source"
                       @if(old('source'))
                       value="{{ old('source') }}"
                       @else
                       value="{{ $student->source }}"
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
                       value="{{ $student->address }}"
                        @endif>
                @if($errors->has('address'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('address') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <label for="phone">Телефон</label>
                <input type="number" name="phone" placeholder="79145663399" id="phone"
                       @if(old('phone'))
                       value="{{ old('phone') }}"
                       @else
                       value="{{ $student->phone }}"
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
                       value="{{ $student->sum }}"
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
                       value="{{ $student->comment }}"
                        @endif>
                @if($errors->has('comment'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('comment') as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif

                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>

            </form>
            <hr>
        </div>
        <form action="{{ route('admin.student.delete', $student->id) }}" method="post">
            @csrf
            <div class="form-btn">
                <button type="submit" class="btn btn-danger">Удалить</button>
            </div>
        </form>
    </div>
@endsection
