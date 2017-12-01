@extends('master')

<?php
$withdraws = \App\Http\Controllers\ClientController::getWithdraws(request()->route('id'));
$deposits = \App\Http\Controllers\ClientController::getDeposits(request()->route('id'));
?>


@section('content')

    <?= Lava::render('AreaChart', 'Monthly', 'yearly') ?>
    <form>


        <div id="yearly"></div>

        <div class="container">
            <div class="row">
                <div class="col s6 m6">
                    <table class="bordered highlight">
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
                    <table class="bordered highlight">
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
