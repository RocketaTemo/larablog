@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Редактирование категории @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent

        <form method="POST" action="{{route('admin.categories.update', $item->id)}}">
            @method('PATCH')

            @include('admin.categories.parts.result_messages')

            @csrf {{--токен для защиты формы--}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.categories.parts.category_edit_left_col')
                </div>
                <div class="col-md-3">
                    @include('admin.categories.parts.category_edit_right_col')
                </div>
            </div>
        </form>
    </div>
@endsection

