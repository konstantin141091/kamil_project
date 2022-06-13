<h3 class="h3-mobile">Поиск в реестре</h3>
<form action="{{ route('admin.student.find') }}" class="admin__form mb-lg-2" method="post">
    @csrf
    <div class="form-row mb-lg-2">
        <div class="col">
            <input class="form-control" type="text" name="protocol_find" placeholder="№ Протокола" value="{{ old('protocol_find') }}">
        </div>
        <div class="col">
            <input class="form-control" type="text" name="surname_find" placeholder="Фамилия" value="{{ old('surname_find') }}">
        </div>
    </div>
    <div class="form-btn">
        <button type="submit" class="btn btn-primary mt-3">Поиск</button>
    </div>
</form>
<hr>
<h3 class="h3-mobile">Просмотр всего реестра</h3>
<div class="form-btn">
    <a href="{{ route('admin.student.index') }}" class="btn btn-success mb-lg-2">Посмотреть</a>
</div>
<hr>
@if(Auth::user()->is_admin)
    <drop-students-component :link="`{{ route('admin.student.deleteAll') }}`"></drop-students-component>
@endif
<hr>
