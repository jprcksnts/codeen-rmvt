    @extends('master')

<?php
$withdraws = \App\Http\Controllers\ClientController::getWithdraws(request()->route('id'));
$deposits = \App\Http\Controllers\ClientController::getDeposits(request()->route('id'));
?>


    @section('content')

        <?= Lava::render('AreaChart', 'Monthly', 'yearly') ?>
        <form>
            <div class="box">

            <br/>

            <input name="transac" type="radio" id="r2" name="transac" value="withdraw" >
            <label for="r2">Withdraw</label>
            <input name="transac" type="radio" id="r3" name="transac" value="deposit" >
            <label for="r3">Deposit</label>
            <br/>
            <br/>
            <br/>
            <div id="yearly"></div>
        </div>

        <div class="container">
            <div class="well">
                <div class="col s6 m12">
                    <table class="bordered highlight">
                        <thead>
                        <tr>
                            <th>Deposit</th>
                            <th>Withdraw</th>



                        </tr>
                        <tr>
                            <th>Amount</th>
                            <th>Amount</th>


                        </tr>
                        </thead>

                        <tbody>

                        @foreach($withdraws as $withdraw)

                            <tr>

                                <td>Php {{$withdraw['amount']}}</td>
                                <td>Php {{$withdraw['amount']}}</td>
                                {{--<td>{{$withdraw['created_at']}}</td>--}}


                            </tr>

                        @endforeach

                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </form>
@stop
