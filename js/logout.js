// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
import { getDatabase, ref, get, set, child, update, remove } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";
import { getAuth, signOut } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-auth.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDaiN6nFMt6Tsdf-xdBSMyoHEX-gCtLlBU",
  authDomain: "blog-artikel-38a84.firebaseapp.com",
  databaseURL: "https://blog-artikel-38a84-default-rtdb.firebaseio.com",
  projectId: "blog-artikel-38a84",
  storageBucket: "blog-artikel-38a84.appspot.com",
  messagingSenderId: "352694236877",
  appId: "1:352694236877:web:329d3c37352f189e1b1b84",
  measurementId: "G-FJES052Y09",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const analytics = getAnalytics(app);
const db = getDatabase();

// ---------- LOGOUT 2 --------------
const logout = document.querySelector('#keluar');
logout.addEventListener('click', (e) => {
    e.preventDefault();
    auth.signOut();
    window.location.replace("login.html");
});