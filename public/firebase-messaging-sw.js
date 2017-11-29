importScripts('https://www.gstatic.com/firebasejs/4.6.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.6.2/firebase-messaging.js');

var config = {
    apiKey: "AAAAAaBw2-o:APA91bEar5lPKdETb5EpNiczXPHz6xsne7lt_XMidLabVrECZ3U5JSfDaX51OokIBJEY-ralOdyhr-FcXVRXvKIU1fHxcu3-jst0EBRiaSmmd1604KG-FXqUTLxxsHeG_0ysPrZpCYY-",
    authDomain: "rmvt-d2136.firebaseapp.com",
    databaseURL: "https://rmvt-d2136.firebaseio.com",
    projectId: "rmvt-d2136",
    storageBucket: "rmvt-d2136.appspot.com",
    messagingSenderId: "6986718186"
};

firebase.initializeApp(config);
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    const title = $payload.notification.title;
    const options = {
        body: payload.notification.body
    };

    return self.registration.showNotification(title, options)
});