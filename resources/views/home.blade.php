@extends('layouts.sidebar')

@section('title', 'Home - Escape Times')

@section('extra-css')
    <style>
        .btn {
            display: block !important;
            margin-top: 5px;
        }
    </style>
@endsection

@section('extra-content')
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Wichtiges</h2>
                <p>Wichtige Infos für die nächste Schicht</p>
                @include('alerts.default')
                @include('alerts.verification')
            </div>
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
                                <p class="text-muted mb-0">{{ $article->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
