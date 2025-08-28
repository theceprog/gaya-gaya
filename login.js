// Import the functions you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";

// ✅ Use only YOUR real Firebase config
const firebaseConfig = {
  apiKey: "AIzaSyCMMcidXWnHi6T-O2PDWDGdV2RvwlfCdMo",
  authDomain: "barangay-system-6c815.firebaseapp.com",
  projectId: "barangay-system-6c815",
  storageBucket: "barangay-system-6c815.appspot.com",
  messagingSenderId: "151670886338",
  appId: "1:151670886338:web:84bdcd020031cfd572905b",
  measurementId: "G-Z53P2J42PV"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Attach login handler
const loginForm = document.getElementById("loginForm");

if (loginForm) {
  loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
      const userCredential = await signInWithEmailAndPassword(auth, email, password);
      alert("✅ Welcome " + userCredential.user.email);

      // Redirect after login
      window.location.href = "dashboard.php";
    } catch (error) {
      alert("❌ Login failed: " + error.message);
      console.error(error);
    }
  });
}
