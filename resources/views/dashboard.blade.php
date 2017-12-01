@extends('master')


<?php
$inverval = \session()->get('interval');

$deposits = \App\Http\Controllers\ChartController::display('yearly');
$withdraws = \App\Http\Controllers\ChartController::displayW('yearly');
?>



@section('content')

    <?= Lava::render('AreaChart', 'Yearly', 'chart') ?>
    <form>
        <div class="container">
            <div class="row">
                <div class="col s12 offset-s6 m6 offset-m6 ">
                    <input type="Submit" value="monthly" name="btnChart">
                    <input type="Submit" value="yearly" name="btnChart">
                    <input type="Submit" value="weekly" name="btnChart">
                    <input type="Submit" value="all" name="btnChart">


                    <br/>
                    <input name="transac" type="radio" id="r1" name="transac" value="volume">
                    <label for="r1">Volume</label>
                    <input name="transac" type="radio" id="r2" name="transac" value="withdraw">
                    <label for="r2">Withdraw</label>
                    <input name="transac" type="radio" id="r3" name="transac" value="deposit">
                    <label for="r3">Deposit</label>

                </div>
                <div class="col s6 m12">
                    <div id="chart"></div>
                </div>



                <div class="well">
                    <p>
                        asdas
                        @foreach($deposits as $deposit)
                            {{$deposit['name']}} deposited Php {{$deposit['amount']}} on {{$deposit['created_at']}}
                        @endforeach
                    </p>

                    <p>
                        asdas
                        @foreach($withdraws as $deposit)
                            {{$deposit['name']}} withdrawed Php {{$deposit['amount']}} on {{$deposit['created_at']}}
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

    </form>
@stop
