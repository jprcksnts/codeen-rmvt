@extends('master')

<?php
$clients = \App\Http\Controllers\ClientController::getClientbyID(request()->route('id'));
?>

@section('content')
    <form>
        <div class="row">
            <?= Lava::render('PieChart', 'Goal', 'yearly') ?>
            <div id="yearly"></div>

            <br>

            <div class="container">
                <table class="bordered highlight white-text">
                    <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Name</th>
                        <th>Balance</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($clients as $client)

                        <tr style=" cursor: pointer" onclick="window.location='/client/overview/{{$client['id']}}'">

                            <td>{{$client['acc_no']}}</td>
                            <td>{{$client['first_name']. ' ' . $client['last_name']}}</td>
                            <td>{{$client['balance']}}</td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </form>
@stop