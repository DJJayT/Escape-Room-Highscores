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
                        <span class="badge rounded-pill bg-primary mb-2">{{ $article->badge->name ?? __('common.deleted_badge') }}</span>
                        <h4>{{ $article->header }}</h4>
                        <p>{{ $article->paragraph }}</p>
                        <div class="d-flex">
                            @php($avatar = $article->user->avatar ?? "default.jpg")
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
                                 src="{{ asset('storage/images/profiles/' . $avatar) }}">
                            <div>
                                <p class="fw-bold mb-0">{{ $article->user->name ?? __('common.deleted_employee') }}</p>


                                <p class="text-muted mb-0">{{ $article->updated_at->format('d.m.Y') }}

                                    @if($article->updated_at != $article->created_at)
                                        ({{ __('common.edited') }})
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if($user->id === $article->user_id)
                            <div class="mt-2 text-center">
                                <a class="btn btn-primary me-2">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a class="btn btn-danger">
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