// reset.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
import { getAuth, confirmPasswordReset } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";

// ✅ Same config as login.js
const firebaseConfig = {
  apiKey: "AIzaSyCMMcidXWnHi6T-O2PDWDGdV2RvwlfCdMo",
  authDomain: "barangay-system-6c815.firebaseapp.com",
  projectId: "barangay-system-6c815",
  storageBucket: "barangay-system-6c815.appspot.com",
  messagingSenderId: "151670886338",
  appId: "1:151670886338:web:84bdcd020031cfd572905b",
  measurementId: "G-Z53P2J42PV"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Get oobCode from email link
const urlParams = new URLSearchParams(window.location.search);
const oobCode = urlParams.get("oobCode");

const resetForm = document.getElementById("resetForm");

resetForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const newPassword = document.getElementById("newPassword").value;

  try {
    await confirmPasswordReset(auth, oobCode, newPassword);
    alert("✅ Password updated. You can log in now.");
    window.location.href = "Login.php";
  } catch (error) {
    alert("❌ " + error.message);
    console.error(error);
  }
});
