<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page (POST)</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .welcome-text {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .email-text {
            font-size: 16px;
            color: #666;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        span.highlight {
            color: #28a745; /* เปลี่ยนเป็นสีเขียวเพื่อให้รู้ว่าส่งสำเร็จ */
        }
        
        .error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="card">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="welcome-text">
                Welcome, <span class="highlight">
                    <?php echo htmlspecialchars($_POST["name"]); ?>
                </span>
            </div>
            
            <div class="email-text">
                Your email address is: <br>
                <strong>
                    <?php echo htmlspecialchars($_POST["email"]); ?>
                </strong>
            </div>

        <?php else: ?>
            <div class="welcome-text">
                No Data Received
            </div>
            <p class="error">Please submit the form using POST method.</p>
        <?php endif; ?>
    </div>

</body>
</html>