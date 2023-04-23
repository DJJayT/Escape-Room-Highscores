@extends('layouts.app')

@section('title', 'Home - Escape Times')

@section('extra-css')
    <style>
        .btn {
            display: block !important;
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center" style="height: 100vh;">
        <div class="card mx-auto">
            @include('alerts.default')
            @include('alerts.verification')
            <div class="card-body">
                <h5 class="card-title">{{ __('home.title') }}</h5>
                <p class="card-text">{{ __('home.description') }}</p>

                <p class="card-text">{{ __('common.greetings', ['name' => Auth::user()->username]) }}</p>
                <a href="{{ route('logout')}}" class="btn btn-primary">{{ __('login.logout') }}</a>
            </div>
        </div>
    </div>
@endsection
