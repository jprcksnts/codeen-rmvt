@extends('master')


<?php
$inverval = \session()->get('interval');

$deposits = \App\Http\Controllers\ChartController::display('yearly');
$withdraws = \App\Http\Controllers\ChartController::displayW('yearly');
?>



@section('content')

    <br><br><br>

    <?= Lava::render('AreaChart', 'Yearly', 'chart') ?>
    <form>

        <div class="row">
            <div class="container">

                    <div class="card">
                        <div class="card-content center-align">

                            <input type="Submit" class="btn" value="week" name="btnChart">
                            <input type="Submit" class="btn" value="month" name="btnChart">
                            <input type="Submit" class="btn" value="year" name="btnChart">

                            <input type="Submit" class="btn" value="all" name="btnChart">

                            <div class="clearfix"></div>
                            <br>
                            <div class="divider"></div>
                            <br>

                            <input name="transac" type="radio" id="r1" name="transac" value="volume">
                            <label for="r1">Volume</label>
                            <input name="transac" type="radio" id="r2" name="transac" value="withdraw">
                            <label for="r2">Withdraw</label>
                            <input name="transac" type="radio" id="r3" name="transac" value="deposit">
                            <label for="r3">Deposit</label>

                        </div>
                    </div>
                    <div id="chart"></div>
            </div>
        </div>
        <div class="row">
            <div class="container">

                <div class="card">
                    <div class="card-content">

                        <p style="text-align: center">
                            Notable Movement: Week to Date
                        </p>
                        <p style="text-align: center">

                            @foreach($deposits as $deposit)
                                {{$deposit['name']}} deposited Php {{$deposit['amount']}} on {{$deposit['created_at']}}
                            @endforeach
                        </p>

                        <p style="text-align: center">

                            @foreach($withdraws as $deposit)
                                {{$deposit['name']}} withdrawed Php {{$deposit['amount']}} on {{$deposit['created_at']}}
                            @endforeach
                        </p>

                    </div>
                </div>

            </div>
        </div>


    </form>
@stop
