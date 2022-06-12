<button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#deleteModal-{{ $id }}">
    Удалить
</button>
<!-- Modal -->
<div class="modal fade" id="deleteModal-{{ $id }}" tabindex="-1" role="dialog"
     aria-labelledby="deleteModalLabel-{{ $id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $id }}">Удаление - {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <form action="{{ route($route, $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
