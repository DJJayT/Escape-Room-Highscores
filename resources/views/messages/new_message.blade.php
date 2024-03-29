@extends('layouts.sidebar')

@section('title', __('sidebar.new-message') . ' - Escape Times')

@section('extra-content')
    <div class="container-fluid mt-5">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-white mb-0">{{ __('messages.create-new') }}</h3>
        </div>
        @include('messages.message_form')
    </div>
@endsection
