@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary pull-right"><i
                            class="fa fa-plus-square-o"></i> Создать категорию</a>
                </nav>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Категория</th>
                            <th>Родительская категория</th>
                            <th class="text-align">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginator as $item)
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
                                <td>
                                    <a class="btn btn-default" href="{{ route('admin.categories.edit', $item->id) }}"><i
                                            class="fa fa-edit"></i></a>
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
