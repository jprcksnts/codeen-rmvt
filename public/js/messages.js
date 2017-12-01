<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-messaging.js"></script>

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

// $(document).ready(function () {
// messaging.onMessage(function (payload) {
//
//     $('.messages-holder').append(
//         '<div class="row">\n' +
//         '   <div class="col s10 m10">\n' +
//         '       <div class="card horizontal">\n' +
//         '           <div class="card-stacked">\n' +
//         '               <div class="card-content">\n' +
//         '                   <p>' + payload.notification.body + '</p>\n' +
//         '               </div>\n' +
//         '           </div>\n' +
//         '       </div>\n' +
//         '   </div>\n' +
//         '</div>'
//     );
//
//     console.log(payload);
// });
// })