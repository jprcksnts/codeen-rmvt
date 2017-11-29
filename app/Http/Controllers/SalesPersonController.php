<?php

namespace App\Http\Controllers;

use App\SalesPerson;
use Illuminate\Http\Request;

class SalesPersonController extends Controller
{
    public function getAllSalesPerson()
    {
        $salesPerson = SalesPerson::all();
        return $salesPerson;
    }
}
