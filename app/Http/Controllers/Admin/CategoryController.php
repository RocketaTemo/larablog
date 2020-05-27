<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;

/**
 * Category management
 *
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends BaseController
{
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //страница вывода всего списка категорий
        $paginator = $this->categoryRepository->getAllWithPaginate(10);

        return view('admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //страница создания категории
        $item = new Category();
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('admin.categories.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        //страница сохранения новой категории
        $data = $request->input();
        if (empty($data['alias'])) {
            $data['alias'] = str_slug($data['title']);
        }

        $item = (new Category())->create($data); //создаст объект и запишет в БД

        if ($item)
            return redirect()
                ->route('admin.categories.edit', [$item->id]) //редирект
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

        $item = $this->categoryRepository->getEdit($id); // получаем запись из БД
        $categoryList = $this->categoryRepository->getForComboBox(); // получаем объекты для выпадающего списка

        return view('admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        //страница сохранения категории

        $item = $this->categoryRepository->getEdit($id); //поиск в БД
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Записть id: {$id} не найдена"]) //кладет в сессию ошибку
                ->withInput();
        } //кладет в сессию предыдущий input

        $data = $request->all();
        if (empty($data['alias'])) {
            $data['alias'] = str_slug($data['title']);
        }
        $result = $item
            ->fill($data) //обновляет свойства объекта модели
            ->save(); //запись в БД

        if ($result) {
            return redirect()
                ->route('admin.categories.edit', $item->id) //редирект
                ->with(['success' => 'Успешно сохранено']);//кладет в сессию 'success'
        }

        return back()
            ->withErrors(['msg' => "Ошибка сохранения"]) // кладет в сессию ошибку
            ->withInput(); // кладет в сессию предыдущий input

    }

}
