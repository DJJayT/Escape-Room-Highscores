<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller {

    /***
     * Shows the registration page
     * @return Application|Factory|View
     */
    public function index() {
        return view('auth.register');
    }

    /***
     * Registers a new user and validates the password's strength
     * @param Request $request
     * @return RedirectResponse
     */
    public function postRegistration(Request $request): RedirectResponse {

        //If the validation fails, the user will be redirected to register with an error message
        //Validates the password if it's strong enough
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
            ],
        ]);

        $data = $request->all();
        $user = $this->create($data);

        event(new Registered($user));

        return redirect()
            ->route('login')
            ->with('success', [__('register.success'), __('register.email_verify_notice')]);
    }

    /***
     * Creates a new user in the database
     * @param array $data
     * @return User
     */
    public function create(array $data): User {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
