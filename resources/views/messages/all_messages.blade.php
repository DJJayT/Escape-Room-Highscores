@extends('layouts.sidebar')

@section('title', __('sidebar.all-messages') . ' - Escape Times')

@section('extra-content')
    <div class="container-fluid mt-5">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-white mb-0">{{ __('messages.all-messages') }}</h3>
        </div>

        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            @foreach($articles as $article)
                <div class="col">
                    <div class="p-4">

                        @include('messages.article')

                        @if($user->id === $article->user_id)
                            <div class="mt-2 text-center">
                                <a class="btn btn-primary me-2" href="{{ route('editMessage', $article->id) }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('deleteMessage', $article->id) }}">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
