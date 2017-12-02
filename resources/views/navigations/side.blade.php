<ul id="side-nav" class="side-nav fixed blue darken-1 white-text">
    <li>
        <div class="user-view">
            <div class="background blue darken-2">
                {{--                <img src="{{ asset('images/nav_logo.png') }}">--}}
            </div>
            {{--<a href="#!user"><img class="circle" src="images/yuna.jpg"></a>--}}
            <a href="#"><span class="white-text email">{{\session()->get('email')}}</span></a>
        </div>
    </li>
    <li id="nav_side_overview">
        <a href="/overview" class="white-text">
            <i class="material-icons white-text">show_chart</i>
            Overview
        </a>
    </li>
    <li id="nav_side_notify" class="white-text">
        <a href="/sales" class=" white-text">
            <i class="material-icons left white-text">person</i>
            Sales People
        </a>
    </li>
    <li id="nav_side_notify" class="white-text">
        <a href="/notify" class=" white-text">
            <i class="material-icons white-text">notifications</i>
            Notify
        </a>
    </li>

    <li id="nav_side_message" class="white-text">
        <a href="#" class="button-collapse-messages white-text" data-activates="message-recipients-nav">
            <i class="material-icons white-text">message</i>
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
        <a class="dropdown-button  white-text" href="#" data-activates="nav_account">
            Account
            <i class="material-icons left white-text">person</i>
            <i class="material-icons right white-text">arrow_drop_down</i>
        </a>
    </li>
    <ul id='nav_account' class='dropdown-content'>
        <li class="blue darken-3"><a href="/control_user/logout" class="white-text">
                <i class="material-icons white-text">power_settings_new </i>
                Logout</a></li>
    </ul>

</ul>