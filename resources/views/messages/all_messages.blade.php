@extends('layouts.sidebar')

@section('title', __('sidebar.new-message') . ' - Escape Times')

@section('extra-content')
    <div class="container-fluid mt-5">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-white mb-0">{{ __('messages.all-messages') }}</h3>
        </div>

        <table class="table table-responsive-md table-striped table-dark mb-0">
            <thead>
            <tr class="text-white">
                <th scope="col">{{ __('messages.header') }}</th>
                <th scope="col">{{ __('messages.badge') }}</th>
                <th scope="col">{{ __('messages.content') }}</th>
                <th scope="col">{{ __('common.from') }}</th>
                <th scope="col">{{ __('common.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr class="text-white">
                    <td><strong>{{ $message->header }}</strong></td>
                    <td>{{ $message->paragraph }}</td>
                    <td>{{ $message->badge->name }}</td>
                    <td>{{ $message->user->name }}</td>
                    <td class="row">
                        <button type="submit" class="btn btn-danger mr-2">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection