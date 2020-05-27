@extends('layouts.app')

@section('content')

    <div class="container">

{{--        @component('admin.components.breadcrumbs')--}}
{{--            @slot('title') Создание новости @endslot--}}
{{--            @slot('parent') Главная @endslot--}}
{{--            @slot('active') Новости @endslot--}}
{{--        @endcomponent--}}

        <hr />
        @if(!$item->exists)
            <form method="POST" action="{{route('admin.posts.store') }}">
                @else
        <form class="form-horizontal" action="{{route('admin.posts.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.posts.parts.post_create_form')

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection
