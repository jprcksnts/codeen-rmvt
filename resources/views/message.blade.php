@extends('master')

@section('pre_script')
    <script type="text/javascript">
        var msg_send_click = null;
    </script>
@stop

@section('content')
    <div class="messages">
        <div id="messages-holder" class="messages-holder">
            <!-- Where messages are stored -->
        </div>

        <div class="divider"></div>

        <div class="messages-input">

            <div class="row" style="margin: 0;">
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
                        '   <div class="col s10 m6 offset-s2 offset-m6">' +
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
                } else {
                    $('.messages-holder').append(
                        '<div class="row" style="padding: 0px; margin:0px;">' +
                        '   <div class="col s10 m6">' +
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