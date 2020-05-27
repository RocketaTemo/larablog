@extends('admin.layouts.app_admin')


@section('content')
    <form method="POST" action="{{route('admin.posts.store')}}">
        @csrf {{--токен для защиты формы--}}
        <div class="container">

            @component('admin.components.breadcrumb')
                @slot('title') Создание новости @endslot
                @slot('parent') Главная @endslot
                @slot('active') Категории @endslot
            @endcomponent

            @include('admin.posts.parts.result_messages')

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.posts.parts.post_create')
                </div>
            </div>
        </div>
    </form>
@endsection

