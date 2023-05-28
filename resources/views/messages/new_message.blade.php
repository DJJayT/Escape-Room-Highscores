@extends('layouts.sidebar')

@section('title', __('sidebar.new-message') . ' - Escape Times')

@section('extra-content')
    <div class="container-fluid mt-5">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-white mb-0">{{ __('messages.create-new') }}</h3>
        </div>
        <form method="post">
            @csrf
            <div class="card shadow mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <div class="mb-3"><label class="form-label" for="header">
                                    <strong>{{ __('messages.header') }}</strong>
                                </label>
                                <input class="form-control" type="text" id="header"
                                       placeholder="{{ __('messages.header') }}" name="header" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div>
                                <label class="form-label" for="badge">
                                    <strong>{{ __('messages.badge') }}</strong>

                                    <select name="badge_id" class="form-select">
                                        <option value="" selected="">{{ __('messages.choose-badge') }}</option>

                                        @foreach($badges as $badge)
                                            <option value="{{ $badge->id }}">{{ $badge->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="message">
                            <strong>{{ __('messages.content') }}</strong>
                        </label>
                        <textarea class="form-control" id="message" rows="4" name="message"
                                  placeholder="{{ __('messages.content') }}" required></textarea>
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
