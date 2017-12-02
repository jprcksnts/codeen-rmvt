@extends('master')

<?php
$salesPeople = \App\Http\Controllers\SalesPersonController::getAllSalesPerson();
?>

@section('content')

    <div class="row">
        <div class="container">
            <div>

            </div>
            <div style="height: 50px;">

                <form><br><br>
                    <table class="bordered highlight white-text">
                        <thead>
                        <tr>

                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($salesPeople as $salesPerson)
                            <tr style=" cursor: pointer" onclick="window.location='/client/{{$salesPerson->id}}'">

                                <td>{{$salesPerson->first_name.' '. $salesPerson->last_name}}</td>

                                <td>{{$salesPerson->email}}</td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    <br><br>
                </form>
            </div>
        </div>
    </div>


@stop