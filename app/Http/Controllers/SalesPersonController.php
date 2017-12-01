<?php

namespace App\Http\Controllers;

use App\SalesPerson;
use Illuminate\Http\Request;

class SalesPersonController extends Controller
{
    public static function getAllSalesPerson()
    {
        $salesPerson = SalesPerson::all();
        return $salesPerson;
    }

    public function doLogin(Request $request)
    {

        $user = SalesPerson::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        try {
            if ($user->id > 0) {
                return response()->json($user);
            } else {
                throw new \Exception('');
            }
        } catch (\Exception $ex) {
            return "{'error': 'Invalid username/password'}";
        }

    }


    public function getToken($id)
    {
        try {
            $salesPerson = SalesPerson::findOrFail($id);
            $token = array();
            $token['token'] = $salesPerson->token;
            return response()->json($token);
        } catch (\Exception $ex) {
            return "{}";
        }
    }

    public function updateToken(Request $request)
    {
        try {
            $salesPerson = SalesPerson::findOrFail($request->id);
            $salesPerson->token = $request->token;
            $salesPerson->save();

            return '{"successful": "true"}';
        } catch (\Exception $ex) {
            return '{"successful": "false"}';
        }
    }
}
