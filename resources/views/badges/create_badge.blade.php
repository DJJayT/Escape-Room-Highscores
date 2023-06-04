@extends('layouts.sidebar')

@section('title', __('sidebar.new-badge') . ' - Escape Times')

@section('extra-content')
    <div class="container-fluid mt-5">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-white mb-0">{{ __('badge.create-new') }}</h3>
        </div>

        <form method="post">
            @csrf
            <div class="card shadow mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <div class="mb-3"><label class="form-label" for="name">
                                    <strong>{{ __('badge.name') }}</strong>
                                </label>
                                <input class="form-control" type="text" id="name"
                                       placeholder="{{ __('badge.name') }}" name="name" maxlength="30" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mb-3">
                <a href="{{ route('home') }}" class="btn btn-primary btn-danger">
                    {{ __('common.cancel') }}
                </a>
                <button class="btn btn-primary me-2" type="submit">{{ __('common.submit') }}</button>
            </div>
        </form>
    </div>

@endsection
