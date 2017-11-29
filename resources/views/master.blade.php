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
</head>

<body>
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
    });
</script>
@yield('script')
</body>
</html>