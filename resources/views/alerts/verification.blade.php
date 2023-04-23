@if (Auth::user()?->hasVerifiedEmail() === false)
    <div class="alert alert-info" role="alert">
        <li class="list-group-item">{{ __('auth.email_not_verified') }}</li>
        <li class="list-group-item">
            <a href="{{ route('verification.resend') }}">
                {{ __('auth.resend_verification') }}
            </a>
        </li>
    </div>
@endif
