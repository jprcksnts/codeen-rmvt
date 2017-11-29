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
}
