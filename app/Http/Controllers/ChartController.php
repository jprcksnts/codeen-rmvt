<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\LavaCharts\LavaCharts;



class ChartController extends Controller
{
    public $value;

    public static function viewChart(Request $request){
        $desc="";
        $sql="";
        $legend="Year";
        $transaction = $request->transac;
        $interval = $request -> btnChart;
        $population = \Lava::DataTable();
        if($transaction == 'deposit'){
            $desc='Deposit';
            switch ($interval){

                case "week":

                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.created_at) AS eDay FROM deposits AS w  WHERE day(w.created_at) > (day(now())-6)  AND month(now()) AND year(now()) GROUP BY day(w.created_at) ');
                    $legend = "Week";
                    break;
                case "year":

                    $sql = \DB::select('SELECT sum(w.amount) as amount, month(w.created_at) as eDay FROM deposits AS w  WHERE year(now()) GROUP BY month(w.created_at) ');
                    $legend = "Year";
                    break;
                case "month":
                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.created_at) AS eDay FROM deposits AS w  WHERE month(now()) and year(now()) GROUP BY day(created_at)');
                    $legend = "Month";
                    break;


                default:
                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.created_at) AS eDay FROM withdrawals AS w  WHERE month(now()) and year(now()) GROUP BY day(created_at)');
            }
        }
        else if($transaction == 'volume'){
            $desc='Volume';
            switch ($interval){

                case "week":
                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.updated_at) AS eDay FROM volumes AS w  WHERE day(w.updated_at) > (day(now())-6)AND month(now()) AND year(now()) GROUP BY day(w.updated_at) ');
                    $legend = "Week";
                    break;
                case "year":

                    $sql = \DB::select('SELECT sum(w.amount) as amount, month(w.updated_at) as eDay FROM volumes AS w  WHERE year(now()) GROUP BY month(w.updated_at) ');
                    $legend = "Year";
                    break;

                case "month":
                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.updated_at) AS eDay FROM volumes AS w  WHERE month(now()) and year(now()) GROUP BY day(updated_at)');
                    $legend = "Month";
                    break;


                default:
                    $sql = \DB::select('SELECT sum(w.amount) as amount, month(w.updated_at) as eDay FROM volumes AS w  WHERE year(now()) GROUP BY month(w.updated_at) ');

            }
        }else if($transaction == 'withdraw'){
            $desc='Withdraw';
            switch ($interval){

                case "week":
                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.created_at) AS eDay FROM withdrawals AS w  WHERE day(w.created_at) > (day(now())-6)  AND month(now()) AND year(now()) GROUP BY day(w.created_at) ');
                    $legend = "Week";
                    break;
                case "year":

                    $sql = \DB::select('SELECT sum(w.amount) as amount, month(w.created_at) as eDay FROM withdrawals AS w  WHERE year(now()) GROUP BY month(w.created_at) ');
                    $legend = "Year";
                    break;
                case "month":
                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.created_at) AS eDay FROM withdrawals AS w  WHERE month(now()) and year(now()) GROUP BY day(created_at)');
                    $legend = "Month";
                    break;


                default:
                    $sql = \DB::select('SELECT sum(w.amount) AS amount, day(w.created_at) AS eDay FROM withdrawals AS w  WHERE month(now()) and year(now()) GROUP BY day(created_at)');

            }
        }
        else{
            $sql = \DB::select('SELECT sum(w.amount) as amount, month(w.updated_at) as eDay FROM volumes AS w  WHERE year(now()) GROUP BY month(w.updated_at) ');


        }



        $population->addNumberColumn('Month')
            ->addNumberColumn($desc);


        (array)$arr = $sql;

        for($i=0; $i<count($arr); $i++){
            $population->addRow([
                $arr[$i]->eDay , $arr[$i]->amount,
            ]);
        }


        $chart = \Lava::AreaChart('Yearly', $population, [
            'title' => $legend ,
            'legend' => [
                'position' => 'none'
            ]
        ]);

        self::displayW($interval);
        self::display($interval);
        return view('dashboard');
    }
    public static function viewchart2()
    {
        $sample='yearly';
        self::display($sample);
        self::displayW($sample);
        $population = \Lava::DataTable();
        $sql = \DB::select('SELECT  sum(amount) AS amount, month(updated_at) AS eDay FROM volumes GROUP BY month(updated_at) order by year(updated_at) ASC, MONTH(updated_at)');
        $desc='Volume';

        $population->addNumberColumn('Month')
            ->addNumberColumn($desc);


        (array)$arr = $sql;

        for($i=0; $i<count($arr); $i++){
            $population->addRow([
                $arr[$i]->eDay , $arr[$i]->amount,
            ]);
        }


        $chart = \Lava::AreaChart('Yearly', $population, [
            'title' => $desc,
            'legend' => [
                'position' => 'in'
            ]
        ]);


        return view('dashboard');
    }

    public static  function display($interval){
        \session()->put('interval', $interval);
        $deposit="";
        switch($interval){
            case "monthly":
                $deposit=\DB::select('SELECT concat(first_name, " ", last_name) AS name, w.created_at, amount from deposits AS w inner join clients AS c on w.clients_id = c.id where year(w.created_at) = year(now())  AND month(w.created_at) = month(now()) order by amount desc limit 1');
                break;

            case "yearly":

                $deposit=\DB::select('SELECT concat(first_name, " ", last_name) AS name, w.created_at, amount from deposits AS w inner join clients AS c on w.clients_id = c.id where year(w.created_at) = year(now())  order by amount desc limit 1');
                break;

            case "weekly":

                $deposit=\DB::select('SELECT concat(first_name, " ", last_name) AS name, w.created_at, amount from deposits AS w inner join clients AS c on w.clients_id = c.id where year(w.created_at) = year(now()) AND day(w.created_at)=(day(now())-7)  AND month(w.created_at) =month(now()) order by amount desc limit 1');
                break;

            default:
        }

        return \GuzzleHttp\json_decode(json_encode($deposit),true);
    }

    public static  function displayW($interval){

        \session()->put('interval', $interval);
        $withdraws="";
        switch($interval){
            case "monthly":
                $withdraws=\DB::select('SELECT concat(first_name, " ", last_name) AS name, w.created_at, amount from withdrawals AS w inner join clients AS c on w.clients_id = c.id where year(w.created_at) = year(now())  AND month(w.created_at) = month(now()) order by amount desc limit 1');
                break;

            case "yearly":

                $withdraws=\DB::select('SELECT concat(first_name, " ", last_name) AS name, w.created_at, amount from withdrawals AS w inner join clients AS c on w.clients_id = c.id where year(w.created_at) = year(now())  order by amount desc limit 1');
                break;

            case "weekly":

                $withdraws=\DB::select('SELECT concat(first_name, " ", last_name) AS name, w.created_at, amount from withdrawals AS w inner join clients AS c on w.clients_id = c.id where year(w.created_at) = year(now()) AND day(w.created_at)=(day(now())-7)  AND month(w.created_at) =month(now()) order by amount desc limit 1');
                break;

            default:
        }

        return \GuzzleHttp\json_decode(json_encode($withdraws),true);
    }

    public static function getSalesChart($id){
        $population = \Lava::DataTable();
      $sql= \DB::table('sales_people')
          ->select('quota_types.goal','goal_meters.amount','goal_meters.quarter')
          ->join('quota_types', 'quota_types.id', '=','sales_people.quota_id'  )
          ->join('goal_meters', 'goal_meters.sales_person_id','=','sales_people.id')
          ->where('sales_people.id','=',$id)
          ->where('goal_meters.quarter','=', \DB::raw('QUARTER(now())'))
          ->orderby('goal_meters.updated_at','DESC')
          ->first();;



        $population->addStringColumn('Goal')
            ->addNumberColumn('Actual');


        $arr = json_decode(json_encode($sql),true);

            $population->addRow([
               "Progress" ,$arr['amount'],
            ]);
        $population->addRow([
            "Amount Left",$arr['goal'],
        ]);





        $chart = \Lava::PieChart('Goal', $population, [
            'title' => 'Goal Meter',
            'legend' => [
                'position' => 'out'
            ]
        ]);
        return view('client');
    }

}