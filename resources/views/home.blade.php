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
                        @include('messages.article')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
