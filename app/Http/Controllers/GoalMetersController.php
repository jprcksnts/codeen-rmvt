<?php

namespace App\Http\Controllers;

use App\GoalMeters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoalMetersController extends Controller
{
    //
    public function getGoal($id)
    {
//        $goal = \DB::select('SELECT q.goal,g.amount,g.quarter FROM sales_people AS s INNER JOIN quota_types AS q on q.id = s.quota_id
//INNER JOIN goal_meters AS g ON g.sales_person_id =  s.id WHERE s.id = '.$id. ' AND g.quarter = QUARTER(now()) ORDER BY g.updated_at DESC LIMIT 1' );
        $goal = DB::table('sales_people')
                    ->select('quota_types.goal','goal_meters.amount','goal_meters.quarter')
                    ->join('quota_types', 'quota_types.id', '=','sales_people.quota_id'  )
                    ->join('goal_meters', 'goal_meters.sales_person_id','=','sales_people.id')
                    ->where('sales_people.id','=',$id)
                    ->where('goal_meters.quarter','=', DB::raw('QUARTER(now())'))
                    ->orderby('goal_meters.updated_at','DESC')
                    ->first();


            return response() -> json($goal);
    }
}
