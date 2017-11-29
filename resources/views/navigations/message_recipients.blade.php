<?php
$salesPeople = \App\Http\Controllers\SalesPersonController::getAllSalesPerson();
?>

<ul id="message-recipients-nav" class="side-nav fixed">
    @foreach($salesPeople as $salesPerson)
        <li><a href="">{{$salesPerson->first_name}}</a></li>
    @endforeach
</ul>