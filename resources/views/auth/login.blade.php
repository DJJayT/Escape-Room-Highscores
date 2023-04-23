@extends('layouts.app')

@section('title', 'Login - Escape Times')

@section('extra-css')
    <style>
        .btn {
            display: block !important;
            width: 100%;
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 30rem">
            <div class="card-body">
                <h5 class="card-title">{{ __('login.title') }}</h5>
                @include('alerts.default')
                <form action="{{ route('postLogin') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="username" class="form-label">{{ __('login.username') }}</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">{{ __('login.password') }}</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <a href="{{ route('password.request') }}">{{ __('login.forgot_password') }}</a>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                        {{ __('login.remember_me') }}
                    </div>


                    <button id="submit" type="submit" class="btn btn-primary">{{ __('login.submit') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
