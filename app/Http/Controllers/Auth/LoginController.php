<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;
class LoginController extends Controller
{
    public function login()
    {
        $credentials = $this->validate(request(), [
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]); 

        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
            if($user->type == 'Cliente')
            {
                return redirect('/');
            }elseif($user->type == 'Admin')
            {
                return redirect('/'); 
            }else
                return redirect('/'); 
        }

        return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
