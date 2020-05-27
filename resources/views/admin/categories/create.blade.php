@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Category $item */
        /**@var \Illuminate\Support\ViewErrorBag $errors */
    @endphp
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf {{--токен для защиты формы--}}
        <div class="container">

            @include('admin.categories.parts.result_messages')

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.categories.parts.category_create')
                </div>
            </div>
        </div>
    </form>
@endsection

