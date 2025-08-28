import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
import { getFirestore, collection, addDoc, serverTimestamp, query, orderBy, onSnapshot } 
  from "https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore.js";

// 🔹 Replace with your Firebase config
const firebaseConfig = {
  apiKey: "YOUR_API_KEY",
  authDomain: "YOUR_PROJECT_ID.firebaseapp.com",
  projectId: "YOUR_PROJECT_ID",
  storageBucket: "YOUR_PROJECT_ID.appspot.com",
  messagingSenderId: "XXXXXXX",
  appId: "XXXXXXXXXXXX"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

const timeline = document.getElementById("timeline");
const statusMsg = document.querySelector(".status-message");

// 🔹 Icons per alert level
function getIcon(level) {
  if (level === "normal") return "✔️";
  if (level === "monitoring") return "⚠️";
  if (level === "alert") return "⛔";
  if (level === "evacuate") return "🚨";
  return "ℹ️";
}

// 🔹 Real-time timeline updates
const q = query(collection(db, "alerts"), orderBy("timestamp", "desc"));
onSnapshot(q, (snapshot) => {
  timeline.innerHTML = "";
  snapshot.forEach(doc => {
    const data = doc.data();
    const time = data.timestamp 
      ? new Date(data.timestamp.toDate()).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) 
      : "--:--";

    const li = `
      <li class="timeline-item ${data.level}">
        <div class="timeline-icon">${getIcon(data.level)}</div>
        <div class="timeline-content">
          <div class="time">${time}</div>
          <div class="level">${data.message}</div>
        </div>
      </li>
    `;
    timeline.innerHTML += li;
  });
});

// 🔹 Helper: send alert
async function sendAlert(level, message) {
  try {
    await addDoc(collection(db, "alerts"), {
      level: level,
      message: message,
      timestamp: serverTimestamp()
    });
    statusMsg.innerHTML = `✅ ${message} sent successfully`;
  } catch (e) {
    console.error("Error sending alert:", e);
    statusMsg.innerHTML = `❌ Failed to send ${message}`;
  }
}

// 🔹 Button event listeners
document.getElementById("btnNormal").addEventListener("click", () => {
  sendAlert("normal", "Normal Status");
});
document.getElementById("btnMonitoring").addEventListener("click", () => {
  sendAlert("monitoring", "Monitoring Ongoing");
});
document.getElementById("btnAlert").addEventListener("click", () => {
  sendAlert("alert", "Flood Alert Issued");
});
document.getElementById("btnEvacuate").addEventListener("click", () => {
  sendAlert("evacuate", "Immediate Evacuation Required");
});
