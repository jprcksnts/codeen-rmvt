@extends('master')

<?php
$clients = \App\Http\Controllers\ClientController::getClientbyID(request()->route('id'));
?>

@section('content')
    <form>
    <div class="row">
        <div class="container">
            <?= Lava::render('ColumnChart', 'Yearly', 'yearly') ?>
            <div class="box">

                <div id="yearly"></div>
            </div>

<div class="box">


                <table class="bordered highlight">
                    <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Name</th>
                        <th>Balance</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($clients as $client)

                        <tr onclick="window.location='/client/overview/{{$client['id']}}'">

                            <td>{{$client['acc_no']}}</td>
                            <td>{{$client['first_name']. ' ' . $client['last_name']}}</td>
                            <td>{{$client['balance']}}</td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>


</div>
        </div>
    </div>
    </form>
@stop