<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Services\BaseService;
use Illuminate\Support\Facades\Log;

/**
 * Class AuthService
 * @package App\Services
 */
class LoginService extends BaseService
{
    public function getModel()
    {
        return Admin::class;
    }
    public function login(array $data = [])
    {
        $credentials = [
            'username' => $data['username'],
            'password' => $data['password']
        ];
        if (Auth::attempt($credentials, true)) {
            return Auth::user();
        }else{
            return false;
        }
    }
}