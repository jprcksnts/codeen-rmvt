<?php
$salesPeople = \App\Http\Controllers\SalesPersonController::getAllSalesPerson();
?>

<ul id="message-recipients-nav" class="message-recipients-nav side-nav">
    @foreach($salesPeople as $salesPerson)
        <li><a href="#" class="message-recipients-nav-person">
                {{$salesPerson->first_name}}
            </a></li>
    @endforeach
</ul>

<div class="fixed-action-btn">
    <a href="#" class="btn-floating btn-large amber darken-3 button-collapse-messages" data-activates="message-recipients-nav">
        <i class="large material-icons">people</i>
    </a>
</div>