<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
<br>
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>id: {{ $item->id }}</li>
                        <li>
                            <div class="form-check">
                                <input name="is_published"
                                       type="hidden"
                                       value="0">
                                <input name="is_published"
                                       type="checkbox"
                                       class="form-check-input"
                                       value="1"
                                       @if($item->is_published)
                                       checked="checked"@endif
                                >
                                <label class="form-check-label" for="is_published">Опубликовано</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Создано</label>
                        <input type="text" value="{{ $item->created_at }}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <input type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="title">Удалено</label>
                        <input type="text" value="{{ $item->deleted_at }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
