<?php
$salesPeople = \App\Http\Controllers\SalesPersonController::getAllSalesPerson();
?>

<ul id="message-recipients-nav" class="message-recipients-nav side-nav">
    @foreach($salesPeople as $salesPerson)
        <li><a id="{{$salesPerson->id}}" href="#"
               class="message-recipients-nav-person" onclick="message_person_click(this)">
                {{$salesPerson->first_name}}
            </a></li>
    @endforeach
</ul>