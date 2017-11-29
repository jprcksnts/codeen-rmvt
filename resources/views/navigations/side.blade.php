<ul id="side-nav" class="side-nav fixed">
    <li>
        <div class="user-view">
            <div class="background orange darken-3">
                {{--                <img src="{{ asset('images/nav_logo.png') }}">--}}
            </div>
            {{--<a href="#!user"><img class="circle" src="images/yuna.jpg"></a>--}}
            <a href="#"><span class="white-text email">email@gmail.com</span></a>
        </div>
    </li>
    <li id="nav_side_overview">
        <a href="/overview">
            <i class="material-icons">show_chart</i>
            Overview
        </a>
    </li>
    <li id="nav_side_notify">
        <a href="/notify">
            <i class="material-icons">notifications</i>
            Notify
        </a>
    </li>
    <li id="nav_side_message">
        <a href="/message">
            <i class="material-icons">message</i>
            Message
        </a>
    </li>
    <li>
        <div class="divider"></div>
    </li>

    {{--<li>--}}
    {{--<a class="subheader">--}}
    {{--Subheader--}}
    {{--</a>--}}
    {{--</li>--}}

    <li>
        <a class="dropdown-button" href="#" data-activates="nav_account">
            Account
            <i class="material-icons left">person</i>
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
    <ul id='nav_account' class='dropdown-content'>
        <li><a href="/logout">Logout</a></li>
    </ul>

</ul>
{{--<a href="#" data-activates="side-nav" class="button-collapse"><i class="material-icons">menu</i></a>--}}