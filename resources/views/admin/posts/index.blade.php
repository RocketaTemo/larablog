@extends('layouts.app')

@section('content')
    <div class="container">
{{--        @component('blog.admin.components.breadcrumbs')--}}
{{--            @slot('title') Список постов @endslot--}}
{{--            @slot('parent') Главная @endslot--}}
{{--            @slot('active') Посты @endslot--}}
{{--        @endcomponent--}}
        <div class="row justify-content-center">
            <div class="col-md-12">
{{--                @include('admin.posts.includes.result_messages')--}}
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{route('admin.posts.create')}}"> Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $post)
                                @php
                                    /** @var \App\Models\Post $post  */
                                @endphp
                                <tr @if(!$post->is_published) style="background-color: #cccc;" @endif >
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->title}}</td>
                                    <td>
                                        <a href="{{route('admin.posts.edit', $post->id)}}">
                                            {{ $post->title }}
                                        </a>
                                    </td>
{{--                                    <td>{{ $post->published_at->format()}}</td>--}}
                                    <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @php /*выводим или нет пагинацию */   @endphp
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
