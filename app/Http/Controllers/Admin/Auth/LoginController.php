<?php

namespace App\Http\Controllers\Admin\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected $loginService;
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    /**
     * Show the form for login.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        return Inertia::render('Auth/Login');
    }
    /**
     * Login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $login = $this->loginService->login($request->only(['username', 'password']));
        if(!$login){
            return back()->withErrors('teedfs', 'login');
        }
    }
}
