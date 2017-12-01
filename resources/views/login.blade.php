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

<main class="valign-wrapper" style="padding: 0 !important;">
    <div class="container">
        <div class="row">

            <form method="POST" action="/control_user/login">
                {{ csrf_field() }}
                <div class="col s12 m6 offset-m3">
                    <div class="card">

                        <div class="card-image">
                            <img src="{{asset('images/logo.png')}}"  style="height: 128px; width: 100%;"/>
                        </div>
                        <div class="card-content">
                            <div class="row" style="padding-bottom: 0; margin-bottom:0;">
                                <div class="col s8 offset-s2">
                                    <h5>Login</h5>
                                    <div class="divider"></div>

                                    <div class="input-field">
                                        <label for="email">Email</label>
                                        <input id="email" class="validate" type="email" name="email">
                                    </div>

                                    <div class="input-field">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-action center-align" style="background: rgba(236, 86, 41, 1)">
                            <button type="submit" class="btn" style="background: rgba(244, 158, 29, 1)">
                                Login
                            </button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</main>

<!--Jquery-->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        <?php
            if (\session()->has('message')) {
                echo "Materialize.toast('" . \session()->get('message') . "', 4000);";
                \session()->forget('message');
            }
        ?>
    });
</script>
@yield('script')
</body>
</html>