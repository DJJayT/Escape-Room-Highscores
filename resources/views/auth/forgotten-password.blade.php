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
                <h5 class="card-title">{{ __('forgottenPassword.title') }}</h5>
                @include('alerts.default')
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('forgottenPassword.email') }}</label>
                        <input type="email" class="form-control" name="email" id="email" required>
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
