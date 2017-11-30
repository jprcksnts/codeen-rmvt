<?php

namespace App\Http\Controllers;

use App\ControlUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ControlUserController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $control_user = ControlUser::where('username', $username)
            ->where('password', $password)->first();

        if (isset($control_user->id)) {
            \session()->put('id', $control_user->id);
            \session()->put('email', $control_user->email);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login');
        }
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/login');
    }
}
