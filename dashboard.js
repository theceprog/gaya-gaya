// dashboard.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.2/firebase-app.js";
import { getFirestore, doc, getDoc } from "https://www.gstatic.com/firebasejs/9.17.2/firebase-firestore.js";

// 🔹 Firebase Config (replace with your credentials)
const firebaseConfig = {
  apiKey: "YOUR_FIREBASE_API_KEY",
  authDomain: "YOUR_PROJECT_ID.firebaseapp.com",
  projectId: "YOUR_PROJECT_ID",
};
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// ----------------------
// Load Flood Data
// ----------------------
async function loadDashboard() {
  try {
    const ref = doc(db, "floodData", "latest");
    const snap = await getDoc(ref);

    if (snap.exists()) {
      const data = snap.data();
      document.getElementById("waterLevel").innerText = data.waterLevel + "%";
      document.getElementById("rainIntensity").innerText = data.rain + " mm/hr";
      document.getElementById("temperature").innerText = data.temp + "°";

      // Change Status Bar Color
      const status = document.getElementById("status");
      if (data.waterLevel < 30) { status.innerText = "SAFE"; status.style.color = "#19c37d"; }
      else if (data.waterLevel < 60) { status.innerText = "MONITOR"; status.style.color = "#f7c948"; }
      else if (data.waterLevel < 80) { status.innerText = "ALERT"; status.style.color = "#f95c2b"; }
      else { status.innerText = "EVACUATE"; status.style.color = "#e74c3c"; }
    }
  } catch (e) {
    console.error("Error loading dashboard:", e);
  }
}

// ----------------------
// Load Weather (OpenWeather API)
// ----------------------
async function loadWeather() {
  const apiKey = "YOUR_OPENWEATHER_API_KEY";  // 👈 Replace
  const lat = 14.8139;  // Gaya-gaya latitude
  const lon = 121.045;  // Gaya-gaya longitude

  try {
    const res = await fetch(
      `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`
    );
    const data = await res.json();

    // Format time HH:MM AM/PM
    const now = new Date();
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;
    const formattedTime = hours + ":" + minutes + " " + ampm;

    // Update UI
    document.getElementById("weatherTime").innerText = "As of " + formattedTime;
    document.getElementById("weatherDesc").innerText =
      data.weather[0].description + " • " + data.main.humidity + "% humidity";
    document.getElementById("temperature").innerText = Math.round(data.main.temp) + "°";
  } catch (e) {
    console.error("Error loading weather:", e);
  }
}

// ----------------------
// Auto Refresh
// ----------------------
loadDashboard();
loadWeather();
setInterval(loadDashboard, 60000);
setInterval(loadWeather, 60000);

