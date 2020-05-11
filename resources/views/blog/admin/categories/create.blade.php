@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\BlogCategory $item */
        /**@var \Illuminate\Support\ViewErrorBag $errors */
    @endphp
    <form method="POST" action="{{ route('blog.admin.categories.store') }}">
        @csrf {{--токен для защиты формы--}}
        <div class="container">
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories.parts.item_create')
                </div>
            </div>
        </div>
    </form>
@endsection

