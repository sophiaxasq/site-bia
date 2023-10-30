/* global importScripts, firebase */
importScripts('https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.1/firebase-messaging.js');

console.log('===========================================');
console.log('FIREBASE SERVICE WORKER LOADED');
console.log('===========================================');

firebase.initializeApp({
    apiKey: "AIzaSyBhoOETyVPewJjJY3rGQzh6729LirjqcOA",
    authDomain: "biap-12d28.firebaseapp.com",
  databaseURL: 'https://biap-12d28-default-rtdb.firebaseio.com/',
  projectId: "biap-12d28",
  storageBucket: "biap-12d28.appspot.com",
  messagingSenderId: "552291498391",
  appId: "1:552291498391:web:de22158691b25822f6acd2",
  measurementId: "G-ESHPZ3L9J2"
});

class CustomPushEvent extends Event {
  constructor(data) {
    super('push');

    Object.assign(this, data);
    this.custom = true;
  }
}

/*
 * Overrides push notification data, to avoid having 'notification' key and firebase blocking
 * the message handler from being called
 */
self.addEventListener('push', (e) => {
  // Skip if event is our own custom event
  if (e.custom) return;

  // Kep old event data to override
  const oldData = e.data;

  // Create a new event to dispatch, pull values from notification key and put it in data key,
  // and then remove notification key
  const newEvent = new CustomPushEvent({
    data: {
      ehheh: oldData.json(),
      json() {
        const newData = oldData.json();
        newData.data = {
          ...newData.data,
          ...newData.notification,
        };
        delete newData.notification;
        return newData;
      },
    },
    waitUntil: e.waitUntil.bind(e),
  });

  // Stop event propagation
  e.stopImmediatePropagation();

  // Dispatch the new wrapped event
  dispatchEvent(newEvent);
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
  // console.log('[firebase-messaging-sw.js] Received background message ', payload);

  const { title, body, icon, ...restPayload } = payload.data;

  const notificationOptions = {
    body,
    icon: icon || '/icons/firebase-logo.png', // path to your "fallback" firebase notification logo
    data: restPayload,
  };

  return self.registration.showNotification(title, notificationOptions);
});

self.addEventListener('notificationclick', (event) => {
  // console.log('[firebase-messaging-sw.js] notificationclick ', event);

  // click_action described at https://github.com/BrunoS3D/firebase-messaging-sw.js#click-action
  if (event.notification.data && event.notification.data.click_action) {
    self.clients.openWindow(event.notification.data.click_action);
  } else {
    self.clients.openWindow(event.currentTarget.origin);
  }
  
  // close notification after click
  event.notification.close();
});