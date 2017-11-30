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

<div class="container">
    <div class="row">

        <form method="POST" action="/process/login">
            {{ csrf_field() }}
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <h5>Login</h5>
                        <div class="divider"></div>

                        <div class="input-field">
                            <label for="email">Username</label>
                            <input id="email" type="text" name="email">
                        </div>

                        <div class="input-field">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password">
                        </div>
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn blue darken-2">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<main>

</main>
<!--Jquery-->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@yield('script')
</body>
</html>