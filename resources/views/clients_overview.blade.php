@extends('master')

<?php
$withdraws = \App\Http\Controllers\ClientController::getWithdraws(request()->route('id'));
$deposits = \App\Http\Controllers\ClientController::getDeposits(request()->route('id'));
$predwithdraws = \App\Http\Controllers\ClientController::getPredictWithdraw(request()->route('id'));
$preddeposits = \App\Http\Controllers\ClientController::getPredictDeposit(request()->route('id'));
?>


@section('content')

    <?= Lava::render('AreaChart', 'Monthly', 'yearly') ?>

    <form>


        <h1>
            Most likely Next Withdraw:  @foreach($predwithdraws as $pwithdraws)
                <tr>

                    <td>{{$pwithdraws['eDay']}}</td>


                </tr>
            @endforeach
        </h1>

        <h1>
            Most likely Next Deposit:  @foreach($preddeposits as $pdeposits)
                <tr>

                    <td>{{$pdeposits['eDay']}}</td>


                </tr>
            @endforeach
        </h1>
        <div id="yearly"></div>

        <br><br>

        <div class="container">
            <div class="row">
                <div class="col s6 m6">
                    <table class="bordered highlight white-text">
                        <thead>
                        <tr>
                            <th>Deposit</th>


                        </tr>

                        </thead>

                        <tbody>

                        @foreach($deposits as $deposit)
                            <tr>

                                <td>Php {{$deposit['amount']}}</td>


                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                </div>
                <div class="col s6 m6 ">
                    <table class="bordered highlight white-text">
                        <thead>
                        <tr>
                            <th>Withdraw</th>


                        </tr>
                        </thead>

                        <tbody>

                        @foreach($withdraws as $withdraw)
                            <tr>

                                <td>Php {{$withdraw['amount']}}</td>

                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </form>
@stop
