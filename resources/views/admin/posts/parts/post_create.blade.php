<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane-active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ $item->title }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Полное описание</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="25"
                                      required>
                           </textarea>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Краткое описание</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="3"
                                      required>
                            </textarea>
                        </div>
                        <label for="category_id">Категория</label>
                        <select name="category_id"
                                id="category_id"
                                class="form-control"
                                placeholder="Выберите категорию"
                                required>
                            @foreach($categoryList as $categoryOption)
                                <option value="{{ $categoryOption->id }}"
                                        @if($categoryOption->id === $item->category_id) selected @endif>
                                    {{ $categoryOption->id_title_combobox }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="alias">ЧПУ статьи</label>
                            <input name="alias" value="{{ $item->alias }}"
                                   id="alias"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-check">
                            <input name="is_published"
                                   type="hidden"
                                   value="0">
                            <input name="is_published"
                                   type="checkbox"
                                   class="form-check-input"
                                   value="{{$item->is_published}}"
                                   @if($item->is_published)
                                   checked="checked"@endif>
                            <label class="form-check-label" for="is_published">Опубликовано</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="car">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
