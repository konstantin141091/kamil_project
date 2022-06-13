<h3 class="h3-mobile">Добавление в реестр записей таблицей excel</h3>
<form action="{{ route('admin.student.import') }}" method="post" enctype="multipart/form-data" class="form-group">
    @csrf
    <label for="students">Загрузите файл excel соответствующий требованиям загрузки</label>
    <input type="file" name="students" class="form-control-file mb-lg-2" id="students" style="font-size: 20px">
    <div class="form-btn">
        <button type="submit" class="btn btn-primary mt-3">Загрузить</button>
    </div>
</form>
<hr>
