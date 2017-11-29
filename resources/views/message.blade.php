@extends('master')

@section('content')
    @include('navigations.message_recipients')

    <div class="messages">

        <div class="messages-holder">

            <div class="row">
                <div class="col s10 m10">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="{{ asset('images/nav_logo.png') }}" style="max-width: 128px;">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s10 m10 offset-s2 offset-m2">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                        <div class="card-image">
                            <img src="{{ asset('images/nav_logo.png') }}" style="max-width: 128px;">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="divider"></div>

        <div class="messages-input">

            <div class="row" style="margin: 0px;">
                <div class="valign-wrapper">
                    <div class="col s8 m9 offset-m1">
                        <input id="message" type="text" placeholder="Message" style="padding-top: 8px;"/>
                    </div>
                    <div class="col s4 m2">
                        <button type="submit" class="btn blue darken-2">
                            <i class="material-icons">send</i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".button-collapse-messages").sideNav({
                edge: 'right', // Choose the horizontal origin
                closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            });

            $('.messaging-recipient-click').click(function (event) {
                alert(event.target.id + ' clicked');
            });
        })
    </script>

    <!-- Firebase Messaging -->
    {{--<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>--}}
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-database.js"></script>

    <script>
        var config = {
//            apiKey: "AIzaSyASiK8l69GHbMwukhwqIouTeiaM7jYOZMw",
            apiKey: "AAAAAaBw2-o:APA91bEar5lPKdETb5EpNiczXPHz6xsne7lt_XMidLabVrECZ3U5JSfDaX51OokIBJEY-ralOdyhr-FcXVRXvKIU1fHxcu3-jst0EBRiaSmmd1604KG-FXqUTLxxsHeG_0ysPrZpCYY-",
            authDomain: "rmvt-d2136.firebaseapp.com",
            databaseURL: "https://rmvt-d2136.firebaseio.com",
            projectId: "rmvt-d2136",
            storageBucket: "rmvt-d2136.appspot.com",
            messagingSenderId: "6986718186"
        };

        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging.requestPermission()
            .then(function () {
                    console.log("Firebase Message Notification Granted");
                }
            )
            .catch(function (ex) {
                console.log(ex);
                console.log("Firebase Messaging Notification Denied/Error");
            });

        messaging.getToken()
            .then(function (token) {
                console.log(token);
            })
            .catch(function (ex) {
                console.log(ex);
                console.log("Firebase Token Fetch Failed");
            });

        $(document).ready(function () {
            messaging.onMessage(function (payload) {
//                alert(payload.notification.title);

                $('.messages-holder').append(
                    '<div class="row">\n' +
                    '   <div class="col s10 m10">\n' +
                    '       <div class="card horizontal">\n' +
                    {{--'           <div class="card-image">\n' +--}}
                    {{--'               <img src="{{ asset(\'images/nav_logo.png\') }}" style="max-width: 128px;">\n' +--}}
                    {{--'           </div>\n' +--}}
                    '           <div class="card-stacked">\n' +
                    '               <div class="card-content">\n' +
                    '                   <p>' + payload.notification.body + '</p>\n' +
                    '               </div>\n' +
//                    '               <div class="card-action">\n' +
//                    '                   <a href="#">This is a link</a>\n' +
//                    '               </div>\n' +
                    '           </div>\n' +
                    '       </div>\n' +
                    '   </div>\n' +
                    '</div>'
                );

                console.log(payload);
            });
        });

        const database = firebase.database();

    </script>
@stop