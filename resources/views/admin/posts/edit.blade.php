@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.posts.parts.result_messages')

        <form method="POST" action="{{route('admin.posts.update', $item->id) }}">
            @method('PATCH')

            @csrf {{--токен для защиты формы--}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.posts.parts.post_edit_left_col')
                </div>
                <div class="col-md-3">
                    @include('admin.posts.parts.post_edit_right_col')
                </div>
            </div>
        </form>
    </div>
@endsection

