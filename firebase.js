// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCBGM5tg2GjzsjS-nvm4r3Fgcsloo7AHyU",
  authDomain: "tubialert.firebaseapp.com",
  projectId: "tubialert",
  storageBucket: "tubialert.firebasestorage.app",
  messagingSenderId: "232097901025",
  appId: "1:232097901025:web:981128a64c0439f71dcaa0",
  measurementId: "G-RF5P92BXHQ"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);