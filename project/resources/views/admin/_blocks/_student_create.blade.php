<h3 class="h3-mobile">Одиночное добавление записи в реестр</h3>
<form action="{{ route('admin.student.create') }}" method="post" class="admin__form">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="№ Протокола" name="protocol" value="{{ old('protocol') }}">
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
            <input type="text" class="form-control"  placeholder="Удостоверение" name="certificates"
                   value="{{ old('certificates') }}">
            @if($errors->has('certificates'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('certificates') as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
        </div>
        <div class="col">
            @if($browser != 'Safari')
                <input type="date" id="inputDate" class="form-control placeholder"  placeholder="Дата окончания: "
                       name="finish_education" value="{{ old('finish_education') }}"
                       onchange="this.className=(this.value!=''?'form-control placeholder has-value':'form-control placeholder')">
            @else
                <datepicker name="finish_education" placeholder="Дата окончания" format="yyyy-MM-dd"
                            value="{{ old('finish_education') }}"
                            input-class="form-control back-fff" :language="ru">

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
    <div class="form-btn"><button type="submit" class="btn btn-primary">Добавить</button></div>
</form>
<hr>
