<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public static function getClients(){
        //TODO: RETURN ALL

        $clients = Client::all();
        return $clients;
    }

    public static function getClientbyID($id){

        $sql = \DB::select('SELECT * FROM clients WHERE salesperson_id='.$id );

        return \GuzzleHttp\json_decode(json_encode($sql),true);
    }

    public static function getCharts($id){


        $desc="Yearly";

        $population = \Lava::DataTable();

        $sql = \DB::select('SELECT sum(w.amount) AS amount, sum(d.amount) AS damount, day(w.created_at) AS eDay FROM withdrawals AS w CROSS JOIN deposits as d WHERE month(now()) and year(now()) AND w.clients_id='. $id.' GROUP BY day(created_at)');


        $population->addNumberColumn('Day')
            ->addNumberColumn('Withdraw')
        ->addNumberColumn('Deposit');


        (array)$arr = $sql;

        for($i=0; $i<count($arr); $i++){
            $population->addRow([
                $arr[$i]->eDay , $arr[$i]->amount, $arr[$i]->damount,
            ]);
        }


        $chart = \Lava::AreaChart('Monthly', $population, [
            'title' => 'Monthly',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        return view('clients_overview');
    }

    public static function getWithdraws($id){
        $sql = \DB::select('SELECT sum(w.amount) AS amount, created_at AS eDay FROM withdrawals AS w  WHERE month(now()) and year(now()) AND clients_id='. $id.' GROUP BY created_at');

        return json_decode(json_encode($sql),true);
    }

    public  static function getDeposits($id){


        $sql = \DB::select('SELECT sum(w.amount) AS amount, created_at AS eDay FROM deposits AS w  WHERE month(now()) and year(now()) AND clients_id='. $id.' GROUP BY created_at');

        return json_decode(json_encode($sql),true);
    }
}
