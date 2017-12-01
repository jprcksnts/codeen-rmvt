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
        $email = $request->email;
        $password = $request->password;
        $control_user = ControlUser::where('email', $email)
            ->where('password', $password)->first();

        if (isset($control_user->id)) {
            \session()->put('id', $control_user->id);
            \session()->put('email', $control_user->email);
            \session()->put('token', $control_user->token);
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

    public function getToken($id)
    {
        try {
            $control_user = ControlUser::findOrFail($id);
            $token = array();
            $token['token'] = $control_user->token;

            \session()->put('token', $control_user->token);
            return response()->json($token);
        } catch (\Exception $ex) {
            return "{}";
        }
    }

    public function updateToken(Request $request)
    {
        try {
            $control_user = ControlUser::findOrFail($request->id);
            $control_user->token = $request->token;
            $control_user->save();

            \session()->put('token', $control_user->token);
            return '{"successful": "true"}';
        } catch (\Exception $ex) {
            return $ex;
            return '{"successful": "false"}';
        }
    }
}
