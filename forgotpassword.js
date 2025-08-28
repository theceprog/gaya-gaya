import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
import { getAuth, sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";

// Firebase config
const firebaseConfig = {
  apiKey: "AIzaSyCMMcidXWnHi6T-O2PDWDGdV2RvwlfCdMo",
  authDomain: "barangay-system-6c815.firebaseapp.com",
  projectId: "barangay-system-6c815",
  storageBucket: "barangay-system-6c815.firebasestorage.app",
  messagingSenderId: "151670886338",
  appId: "1:151670886338:web:84bdcd020031cfd572905b"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

const form = document.getElementById("forgotForm");
const message = document.getElementById("message");
const resendBtn = document.getElementById("resendBtn");

let timer;

// Function to start resend timer
function startTimer(seconds) {
  let remaining = seconds;
  resendBtn.disabled = true;
  resendBtn.textContent = `Resend Link (${remaining}s)`;

  timer = setInterval(() => {
    remaining--;
    resendBtn.textContent = `Resend Link (${remaining}s)`;

    if (remaining <= 0) {
      clearInterval(timer);
      resendBtn.disabled = false;
      resendBtn.textContent = "Resend Link";
    }
  }, 1000);
}

// Send reset link
async function sendReset(email) {
  try {
    const actionCodeSettings = {
      url: "http://localhost/Tubialert%20-%20Copy/Resetpassword.php",
      handleCodeInApp: true,
    };

    await sendPasswordResetEmail(auth, email, actionCodeSettings);
    message.style.display = "block";
    message.textContent = "✅ Reset link sent! Check your email.";
    resendBtn.style.display = "inline-block";
    startTimer(30);
  } catch (error) {
    alert("❌ Error: " + error.message);
  }
}

// Form submit
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const email = document.getElementById("email").value;
  sendReset(email);
});

// Resend link
resendBtn.addEventListener("click", () => {
  const email = document.getElementById("email").value;
  if (email) {
    sendReset(email);
  } else {
    alert("⚠️ Enter your email first.");
  }
});
