@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Категорий 0</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Постов 0</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Посетителей 0</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Сегодня 0</span></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{route('admin.categories.create')}}">Создать категорию</a>
                <a class="list-group-item" href="#">
                    <h4 class="list-group-item-heading">======</h4>
                    <p class="list-group-item-text">
                        Новость
                    </p>
                </a>
{{--                @foreach($categories as $category)--}}
{{--                <a class="list-group-item" href="{{route('admin.categories.edit', $category)}}">--}}
{{--                    <h4 class="list-group-item-heading">{{$category->title}}</h4>--}}
{{--                    <p class="list-group-item-text">--}}
{{--                        {{$category->post()->count()}}--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                @endforeach--}}
            </div>
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{route('admin.posts.create')}}">Создать новость</a>
                <a class="list-group-item" href="#">
                    <h4 class="list-group-item-heading">Пост первый</h4>
                    <p class="list-group-item-text">
                        Категория
                    </p>
                </a>
            </div>
        </div>
    </div>
@endsection
