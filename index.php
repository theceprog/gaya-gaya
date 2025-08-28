<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to New Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 40px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            animation: fadeIn 0.8s ease-out;
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 25px;
            font-size: 18px;
        }
        
        .countdown {
            font-size: 32px;
            font-weight: 700;
            color: #6e8efb;
            margin: 30px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .countdown-number {
            background: #6e8efb;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            min-width: 80px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 50px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: #6e8efb;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a7ce7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-secondary {
            background: transparent;
            color: #6e8efb;
            border: 2px solid #6e8efb;
        }
        
        .btn-secondary:hover {
            background: rgba(110, 142, 251, 0.1);
            transform: translateY(-2px);
        }
        
        .progress-bar {
            height: 6px;
            background: #e0e0e0;
            border-radius: 3px;
            overflow: hidden;
            margin: 30px 0;
        }
        
        .progress {
            height: 100%;
            background: linear-gradient(90deg, #6e8efb, #a777e3);
            width: 0%;
            transition: width 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 25px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            p {
                font-size: 16px;
            }
            
            .countdown {
                font-size: 24px;
            }
            
            .buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>You're Being Redirected</h1>
        <p>This page is automatically redirecting to our new location. You'll be taken to the new page in just a moment.</p>
        
        <div class="countdown">
            Redirecting in <div class="countdown-number" id="countdown">3</div> seconds
        </div>
        
        <div class="progress-bar">
            <div class="progress" id="progress"></div>
        </div>
        
        <div class="buttons">
            <button class="btn btn-primary" onclick="redirectNow()">Redirect Now</button>
            <button class="btn btn-secondary" onclick="cancelRedirect()">Cancel Redirect</button>
        </div>
    </div>

    <script>
        let countdown = 3;
        let countdownInterval;
        const progressBar = document.getElementById('progress');
        const countdownElement = document.getElementById('countdown');
        
        function startCountdown() {
            updateProgressBar();
            countdownInterval = setInterval(() => {
                countdown--;
                countdownElement.textContent = countdown;
                updateProgressBar();
                
                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    performRedirect();
                }
            }, 1000);
        }
        
        function updateProgressBar() {
            const progress = ((3 - countdown) / 3) * 100;
            progressBar.style.width = progress + '%';
        }
        
        function performRedirect() {
            // In a real scenario, this would be your target URL
            window.location.href = 'dashboard.php';
        }
        
        function redirectNow() {
            clearInterval(countdownInterval);
            performRedirect();
        }
        
        function cancelRedirect() {
            clearInterval(countdownInterval);
            document.querySelector('p').textContent = 'Redirect cancelled. You can continue browsing this page.';
            document.getElementById('countdown').textContent = '0';
            progressBar.style.width = '100%';
            document.querySelector('.buttons').innerHTML = 
                '<button class="btn btn-primary" onclick="startCountdown()">Restart Redirect</button>';
        }
        
        // Start the countdown when page loads
        window.onload = startCountdown;
    </script>
</body>
</html>