// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyDZSfIwc_uJ4ZxOPnSRykFhl-sI9A3-4Ik",
    authDomain: "workshop-60fd9.firebaseapp.com",
    databaseURL: "https://workshop-60fd9-default-rtdb.firebaseio.com",
    projectId: "workshop-60fd9",
    storageBucket: "workshop-60fd9.appspot.com",
    messagingSenderId: "711544889573",
    appId: "1:711544889573:web:a287539941b6c30d69f40c",
});
// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("ok mi 2");

    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/favicon.ico",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions
    );
});
