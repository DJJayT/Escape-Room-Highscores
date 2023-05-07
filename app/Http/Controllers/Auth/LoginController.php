<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Requests\LoginRequest;
use App\Requests\PostResetRequest;
use Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Str;

class LoginController extends Controller {

    /***
     * Shows the login page
     * @return Application|Factory|View
     */
    public function index() {
        return view('auth.login');
    }

    /***
     * Shows the login page with the additional information that the user has to be logged in to access the page
     * @return RedirectResponse
     */
    public function loginRequired(): RedirectResponse {
        return redirect()
            ->route('login')
            ->with('error', __('auth.login_required'));
    }

    /***
     * Validates the login form and logs the user in
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request): RedirectResponse {
        // If the validation fails, the user will be redirected to login with an error message
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()
                ->route('home')
                ->with('success', __('login.success'));
        }

        //If the credentials are wrong, the user will be redirected to login with a neutral error message
        //It won't tell the user if the username or password is wrong or either the user even exists
        return redirect()
            ->route('login')
            ->with('error', __('login.error'));
    }

    /***
     * Logs the user out and redirects him to the home-page
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse {
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('success', __('login.logout_message'));
    }

    /***
     * Shows the view for the forgotten password page
     * @return Application|Factory|View
     */
    public function forgottenPassword() {
        return view('auth.forgotten-password');
    }

    /***
     * Sends the password reset email
     * @param Request $request
     * @return RedirectResponse
     */
    public function requestPasswordEmail(Request $request): RedirectResponse {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['info' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /***
     * Shows the view for the reset password page
     * @return Application|Factory|View
     */
    public function resetPassword(Request $request, string $token) {
        return view('auth.reset-password')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /***
     * Resets the password, validates the form and logs the user in
     * @param PostResetRequest $request
     * @return RedirectResponse
     */
    public function postResetPassword(PostResetRequest $request): RedirectResponse {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])
                    ->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()
                ->route('login')
                ->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
