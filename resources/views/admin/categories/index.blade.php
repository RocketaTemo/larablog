@extends('layouts.app')

@section('content')
    <div class="container">
{{--        @component('blog.admin.components.breadcrumbs')--}}
{{--            @slot('title') Список категорий @endslot--}}
{{--            @slot('parent') Главная @endslot--}}
{{--            @slot('active') Категории @endslot--}}
{{--        @endcomponent--}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{route('admin.categories.create')}}">Добавить</a>
                </nav>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Категория</th>
                            <th>Родительская категория</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginator as $item)
                            @php /** @var \App\Models\Category $item **/ @endphp
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td @if(in_array($item->parent_id, [0, 1], true)) style="color:#ccc" @endif>
                                    {{ $item->parent_id}}{{-- $item->parentCategory->title --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    @if($paginator->total() >= $paginator->count())
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
