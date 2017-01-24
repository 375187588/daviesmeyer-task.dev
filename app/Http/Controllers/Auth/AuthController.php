<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $userdata = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        );

        if (Auth::attempt($userdata) && Auth::user()->hasRole('admin')) {
            request()->session()->flash('message', 'Welcome Admin!');

            return redirect()->route('admin');
        }

        request()->session()->flash('message', 'There is no user with sent credentials!');

        return redirect()->route('auth.login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        request()->session()->flash('message', 'Goodbye!');

        return redirect()->route('auth.logout');
    }
}
