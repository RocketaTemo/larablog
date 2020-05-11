<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //страница вывода всего списка категорий
        $paginator = BlogCategory::paginate(10);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //страница создания категории

      $item = new BlogCategory();
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        //страница сохранения новой категории
        $data = $request->input();
        if (empty($data['alias'])) {
            $data['alias'] = str_slug($data['title']);
        }

        $item = (new BlogCategory())->create($data); //создаст объект и запишет в БД

        if ($item)
            return redirect()
                ->route('blog.admin.categories.edit', [$item->id]) //редирект
                ->with(['success' => 'Успешно сохранено']); //кладет в сессию 'success'

        else
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"]) //кладет в сессию ошибку
                ->withInput(); //кладет в сессию предыдущий input

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //страница редактирования категории

        $item = BlogCategory::where('id', $id)->first();

        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        //страница сохранения категории

        $item = BlogCategory::find($id); //поиск в БД
        if (empty($item))
            return back()
                ->withErrors(['msg' => "Записть id: {$id} не найдена"]) //кладет в сессию ошибку
                ->withInput(); //кладет в сессию предыдущий input

        $data = $request->all();
        if (empty($data['alias'])) {
            $data['alias'] = str_slug($data['title']);
        }
        $result = $item
            ->fill($data) //обновляет свойства объекта модели
            ->save(); //запись в БД

        if ($result)
            return redirect()
                ->route('blog.admin.categories.edit', $item->id) //редирект
                ->with(['success' => 'Успешно сохранено']); //кладет в сессию 'success'

        else
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"]) //кладет в сессию ошибку
                ->withInput(); //кладет в сессию предыдущий input

    }

}
