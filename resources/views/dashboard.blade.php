@extends('master')


<?php
$deposits = \App\Http\Controllers\ChartController::display();
$withdraws = \App\Http\Controllers\ChartController::displayW();
?>



@section('content')
    <?= Lava::render('AreaChart', 'Yearly', 'yearly') ?>
    <form>
        <div class="box">
        <input type="Submit" value="monthly" name="btnChart">
        <input type="Submit" value="yearly" name="btnChart">
        <input type="Submit" value="weekly" name="btnChart">
        <input type="Submit" value="all" name="btnChart">


        <br/>
        <input name="transac" type="radio" id="r1" name="transac" value="volume" >
            <label for="r1">Volume</label>
        <input name="transac" type="radio" id="r2" name="transac" value="withdraw" >
            <label for="r2">Withdraw</label>
        <input name="transac" type="radio" id="r3" name="transac" value="deposit" >
            <label for="r3">Deposit</label>
        <br/>
        <br/>
        <br/>
        <div id="yearly"></div>
        </div>
        <div class="box">
            <p>

                @foreach($deposits as $deposit)
                  {{$deposit['name']}} deposited Php {{$deposit['amount']}} on {{$deposit['created_at']}}
                @endforeach
            </p>

            <p>

                @foreach($withdraws as $deposit)
                    {{$deposit['name']}} withdrawed Php {{$deposit['amount']}} on {{$deposit['created_at']}}
                @endforeach
            </p>
        </div>
    </form>
@stop
