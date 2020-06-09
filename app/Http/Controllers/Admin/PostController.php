<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Gate;


class PostController extends AdminBaseController
{

    private $postRepository;
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct(); // вызваем конструктор родителя

        $this->postRepository = app(PostRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
//        if(Gate::denies('check-posts')){
//            return redirect()->back()->withErrors(['action' => 'Gate error']);
//        }

        //страница вывода списка постов
        $paginator = $this->postRepository->getAllWithPaginate();
        return view('admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //страница создания поста
        $item = new Post();
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('admin.posts.create', compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateRequest $request
     * @return Response
     */
    public function store(PostCreateRequest $request)
    {
        //страница сохранения нового поста
        $data = $request->input();

//          Ушло в обсервер
//        if (empty($data['alias'])) {
//            $data['alias'] = str_slug($data['title']);
//        }

        $item = (new Post())->create($data); //создаст объект и запишет в БД

        if ($item) {
            return redirect()
                ->route('admin.posts.edit', [$item->id]) //редирект
                ->with(['success' => 'Успешно сохранено']);
        } //кладет в сессию 'success'

        else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"]) //кладет в сессию ошибку
                ->withInput();
        } //кладет в сессию предыдущий input

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function edit($id)
    {
        //страница редактирования категории

        $item = $this->postRepository->getEdit($id); // получаем запись из БД
        $categoryList = $this->categoryRepository->getForComboBox(); // получаем объекты для выпадающего списка

        return view('admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $item = $this->postRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись №{$id} не найдена"])
                ->withInput();
        }

        $data = $request->all(); // поулчаем все request-данные которые приходят

        //нужен Observer
//        if (empty($data['alias'])) {
//            $data['alias'] = str_slug($data['title']); // генерация ЧПУ
//        }
//        if (empty($item->published_at) && $data['is_published']) {
//            $data['published_at'] = Carbon::now(); // получаем текущее время
//        }

        $result = $item->update($data); // обновляем данные, модель Post->update()

        if ($result) {
            return redirect() // обновление страницы с выводом соотв. сообщения
                ->route('admin.posts.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
