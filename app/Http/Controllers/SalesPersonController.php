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

    public static function getAllSalesPersonWithToken(){
        $salesPerson = SalesPerson::whereNotNull('token')->get();
        return $salesPerson;
    }

    public function login(Request $request)
    {
        $salesPerson = SalesPerson::where('email', $request->email)
            ->where('password', $request->password)->first();

        return response()->json($salesPerson);
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

            return '{"success": "true"}';
        } catch (\Exception $ex) {
            return response()->json($request);
            return '{"success": "false"}';
        }
    }
}
