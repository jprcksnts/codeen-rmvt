<!DOCTYPE html>
<html>
<head>
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection"/>
    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}" media="screen,projection"/>

    <!--Optimize Browser for Mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    @yield('header')
    <script type="text/javascript">
        var message_person_click = null
    </script>
    @yield('pre_script')
</head>

<body>
@include('navigations.message_recipients')
@include('navigations.side')

<main>
    @yield('content')
</main>
<!--Jquery-->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".button-collapse").sideNav();
        $(".collapsible").collapsible();

        $(".button-collapse-messages").sideNav({
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });

        message_person_click = function (element) {
            $.ajax({
                method: "POST",
                url: '/conversation',
                data: {
                    "control_user_id": 1,
                    "sales_person_id": element.id
                },
                success: function (response) {
                    console.log("From Person Click: " + response);
                    var conversation = $.parseJSON(response);
                    var conversation_id = conversation.id;
                    window.location.href = '/message/' + conversation_id;
                }
            });
        };
    });
</script>
@yield('script')
</body>
</html>