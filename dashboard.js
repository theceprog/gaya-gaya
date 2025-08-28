// dashboard.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.2/firebase-app.js";
import { getFirestore, doc, getDoc } from "https://www.gstatic.com/firebasejs/9.17.2/firebase-firestore.js";

// 🔹 Firebase Config (replace with your credentials)
const firebaseConfig = {
  apiKey: "AIzaSyBwIc14y20T7BP5CzbT6g6o2U2ZcjTH_9U",
  authDomain: "tubialert-dc2fd.firebaseapp.com",
  projectId: "tubialert-dc2fd",
};
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// ----------------------
// Load Flood Data
// ----------------------
async function loadDashboard() {
  try {
    const ref = doc(db, "sensor", "1");
    const snap = await getDoc(ref);

    if (snap.exists()) {
      const data = snap.data();
      document.getElementById("waterLevel").innerText = data.water + "%";
      document.getElementById("rainIntensity").innerText = data.rain + " mm/hr";
      document.getElementById("temperature").innerText = data.temp + "°";

      // Change Status Bar Color
      const status = document.getElementById("status");
      if (data.status === "SAFE") { status.innerText = "SAFE"; status.style.color = "#19c37d"; }
      else if (data.status === "MONITORING") { status.innerText = "MONITOR"; status.style.color = "#f7c948"; }
      else if (data.status === "ALERT") { status.innerText = "ALERT"; status.style.color = "#f95c2b"; }
      else { status.innerText = "EVACUATE"; status.style.color = "#e74c3c"; }
    }
  } catch (e) {
    console.error("Error loading dashboard:", e);
  }
}
async function getLocationKey(lat, lon, apiKey) {
  try {
    const res = await fetch(
      `https://dataservice.accuweather.com/locations/v1/cities/geoposition/search?apikey=${apiKey}&q=${lat},${lon}`
    );
    const data = await res.json();
    return data.Key;
  } catch (e) {
    console.error("Error getting location key:", e);
    return null;
  }
}

async function loadWeather() {
  const apiKey = "BphYMJ4IIbBH9XXfPnBUGTcn0EZIfoOb";
  const locationKey = await getLocationKey(14.8139, 121.045, apiKey);


  try {
    const res = await fetch(
      `https://dataservice.accuweather.com/currentconditions/v1/${locationKey}?apikey=${apiKey}&details=true`
    );
    const data = await res.json();

    if (data.length === 0) {
      throw new Error("No weather data found");
    }

    const weatherData = data[0];

    const now = new Date();
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;
    const formattedTime = hours + ":" + minutes + " " + ampm;

    document.getElementById("weatherTime").innerText = "As of " + formattedTime;
    document.getElementById("weatherDesc").innerText =
      weatherData.WeatherText + " • " + weatherData.RelativeHumidity + "% humidity";
    document.getElementById("temperature").innerText =
      Math.round(weatherData.Temperature.Metric.Value) + "°";
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

