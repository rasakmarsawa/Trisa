// TODO: Replace firebaseConfig you get from Firebase Console
var firebaseConfig = {
  apiKey: "AIzaSyDEyjNQD5H-NfqXTYmD0W9YJTj0UG3yJiA",
  authDomain: "trisha-b7e50.firebaseapp.com",
  projectId: "trisha-b7e50",
  storageBucket: "trisha-b7e50.appspot.com",
  messagingSenderId: "854053949073",
  appId: "1:854053949073:web:67e5448b433b349f787930",
  measurementId: "${config.measurementId}"
};
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging
    .requestPermission()
    .then(function () {
        console.log('Notification permission granted.');

        // get the token in the form of promise
        return messaging.getToken();
    })
    .then(function (token) {
      $.post("controller/saveToken.php",
       {
         fcm_token: token,
       },
       function(data, status){
         console.log("Data: " + data );
         console.log("Status: " + status);
       });
    })
    .catch(function (err) {
        console.log('Unable to get permission to notify.', err);
    });

let enableForegroundNotification = true;
messaging.onMessage(function (payload) {
    console.log('Message received. ', payload);

    if (enableForegroundNotification) {
        let notification = payload.notification;
        navigator.serviceWorker
            .getRegistrations()
            .then((registration) => {
                registration[0].showNotification(notification.title);
            });
    }
});
