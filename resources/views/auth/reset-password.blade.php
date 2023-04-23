@extends('layouts.app')

@section('title', 'Reset Password - Escape Times')

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
                <h5 class="card-title">{{ __('forgottenPassword.reset_title') }}</h5>
                @include('alerts.default')
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="mb-1">
                        <label for="password" class="form-label">{{ __('register.password') }}</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation"
                               class="form-label">{{ __('register.confirm_password') }}</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               id="password_confirmation" required>
                    </div>

                    <button id="submit" type="submit"
                            class="btn btn-primary">{{ __('forgottenPassword.submit') }}</button>

                    <a class="text-decoration-none" href="{{ route('login') }}">
                        <button type="button" class="btn btn-secondary">{{ __('common.back') }}</button>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
