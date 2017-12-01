@extends('master')

<?php
$salesPeople = \App\Http\Controllers\SalesPersonController::getAllSalesPerson();
?>

@section('content')


    <div class="row">
        <div class="container">
            <div >
                tangina mo po
            </div>
            <div style="height: 50px;">
            <form>

                <table class="bordered highlight" >
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($salesPeople as $salesPerson)
                        <tr onclick="window.location='/client/{{$salesPerson->id}}'">

                            <td>{{$salesPerson->first_name.' '. $salesPerson->last_name}}</td>

                            <td>{{$salesPerson->email}}</td>

                        </tr>
                    @endforeach



                    </tbody>
                </table>

            </form>
            </div>
        </div>
    </div>


@stop