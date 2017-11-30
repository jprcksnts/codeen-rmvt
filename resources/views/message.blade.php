@extends('master')

@section('pre_script')
    <script type="text/javascript">
        var msg_send_click = null;
    </script>
@stop

@section('content')
    <div class="messages">
        <div id="messages-holder" class="messages-holder">
            {{--<div class="row">--}}
            {{--<div class="col s10 m10">--}}
            {{--<div class="card horizontal">--}}
            {{--<div class="card-image">--}}
            {{--<img src="{{ asset('images/nav_logo.png') }}" style="max-width: 128px;">--}}
            {{--</div>--}}
            {{--<div class="card-stacked">--}}
            {{--<div class="card-content">--}}
            {{--<p>I am a very simple card. I am good at containing small bits of information.</p>--}}
            {{--</div>--}}
            {{--<div class="card-action">--}}
            {{--<a href="#">This is a link</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
            {{--<div class="col s10 m10 offset-s2 offset-m2">--}}
            {{--<div class="card horizontal">--}}
            {{--<div class="card-stacked">--}}
            {{--<div class="card-content">--}}
            {{--<p>I am a very simple card. I am good at containing small bits of information.</p>--}}
            {{--</div>--}}
            {{--<div class="card-action">--}}
            {{--<a href="#">This is a link</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card-image">--}}
            {{--<img src="{{ asset('images/nav_logo.png') }}" style="max-width: 128px;">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>

        <div class="divider"></div>

        <div class="messages-input">

            <div class="row" style="margin: 0px;">
                <div class="valign-wrapper">
                    <div class="col s8 m9 offset-m1">
                        <input id="message" type="text" placeholder="Message" style="padding-top: 8px;"/>
                    </div>
                    <div class="col s4 m2">
                        <button id="btnMessageSend" type="button" class="btn blue darken-2">
                            <i class="material-icons">send</i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@stop

@section('script')
    <!-- Firebase Messaging -->
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-messaging.js"></script>

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
    </script>

    <!-- Messages -->
    <script src="{{ asset('js/messages.js') }}"></script>

    <!-- Conversation -->
    <script type="text/javascript">
        const conversation = firebase.database().ref('conversations').child('{{ request()->route('id') }}');

        $(document).ready(function () {
            $('#message').keyup(function (e) {
                if (e.keyCode == 13) {
                    msgSend();
                }
            });

            $('#btnMessageSend').click(function () {
                msgSend();
            });

            function msgSend() {
                var message = $('#message');
                var messagePush = conversation.push({
                    body: message.val(),
                    fromControl: true,
                });

                message.val('');
            };

            //Execute on new messages
            conversation.on('child_added', snap => {
                var response = JSON.stringify(snap.val());
                var messages = $.parseJSON(response);
                console.log(messages);

                if (messages.fromControl) {
                    $('.messages-holder').append(
                        '<div class="row" style="padding: 0px; margin:0px;">' +
                        '   <div class="col s10 m10 offset-s10 offset-m2 ">' +
                        '       <div class="card horizontal blue white-text">' +
                        '           <div class="card-stacked">' +
                        '               <div class="card-content">' +
                        '                   <p>' + messages.body + '</p>' +
                        '               </div>' +
                        '           </div>' +
                        '       </div>' +
                        '   </div>' +
                        '</div>'
                    )
                } else{
                    $('.messages-holder').append(
                        '<div class="row" style="padding: 0px; margin:0px;">' +
                        '   <div class="col s10 m10">' +
                        '       <div class="card horizontal">' +
                        '           <div class="card-stacked">' +
                        '               <div class="card-content">' +
                        '                   <p>' + messages.body + '</p>' +
                        '               </div>' +
                        '           </div>' +
                        '       </div>' +
                        '   </div>' +
                        '</div>'
                    )
                }
            });
        });
    </script>
@stop