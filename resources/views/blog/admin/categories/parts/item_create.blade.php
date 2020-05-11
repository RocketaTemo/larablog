@php
    /** @var \App\Models\BlogCategory $item **/
    /** @var \Illuminate\Support\Collection $categoryList **/
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Создание категории</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane-active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="alias">Идентификатор</label>
                            <input name="alias"
                                   id="alias"
                                   type="text"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select name="parent_id"
                                    id="parent_id"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required>
                                @foreach($categoryList as $category)
                                    <option value="{{ $category->id }}"
                                            @if($category->id == $category->parent_id) selected @endif>
                                        {{ $category->id }} . {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                      id="description"
                                      class="form-control"
                                      rows="3">
                            </textarea>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="car">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>