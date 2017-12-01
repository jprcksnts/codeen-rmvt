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

<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-messaging.js"></script>

<script type="text/javascript">

    var config = {
        apiKey: "AAAAAaBw2-o:APA91bEar5lPKdETb5EpNiczXPHz6xsne7lt_XMidLabVrECZ3U5JSfDaX51OokIBJEY-ralOdyhr-FcXVRXvKIU1fHxcu3-jst0EBRiaSmmd1604KG-FXqUTLxxsHeG_0ysPrZpCYY-",
        authDomain: "rmvt-d2136.firebaseapp.com",
        databaseURL: "https://rmvt-d2136.firebaseio.com",
        projectId: "rmvt-d2136",
        storageBucket: "rmvt-d2136.appspot.com",
        messagingSenderId: "6986718186"
    };

    firebase.initializeApp(config);

    $(document).ready(function () {
        $(".button-collapse").sideNav();
        $(".collapsible").collapsible();

        $(".button-collapse-messages").sideNav({
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });

        const messaging = firebase.messaging();
        messaging.requestPermission()
            .then(function () {
                    console.log("Firebase Message Notification Granted");
                }
            )
            .catch(function (ex) {
                console.log(ex);
                console.log("Firebase Messaging Notification Denied/Error");
                Materialize.toast('To receive notifications, please enable notification permission on your browser', 5000)
            });

        messaging.getToken()
            .then(function (token) {
                updateTokenInServer(token);
            })
            .catch(function (ex) {
                console.log(ex);
                console.log("Firebase Token Fetch Failed");
            });

        messaging.onTokenRefresh(function() {
            messaging.getToken()
                .then(function(refreshedToken) {
                    updateTokenInServer(refreshedToken);
                })
                .catch(function(err) {
                    console.log('Unable to retrieve refreshed token ', err);
                });
        });

        function updateTokenInServer(token){
            $.ajax({
                method: "POST",
                url: '/control_user/token',
                data: {
                    "id": {{\session()->get('id')}},
                    "token": token
                },
                success: function (response) {
                    console.log("Token Updated: " + response);
                },
                error: function(error){
                    console.log("Failed to update token");
                    console.log(error);
                }
            });
        }

        message_person_click = function (element) {
            $.ajax({
                method: "POST",
                url: '/conversation',
                data: {
                    "control_user_id": {{\session()->get('id')}},
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