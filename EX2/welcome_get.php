<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5; /* สีพื้นหลังสบายตา */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: white;
            padding: 40px;
            border-radius: 15px; /* มุมโค้ง */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* เงาให้ดูมีมิติ */
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
            color: #007bff; /* สีน้ำเงินเน้นข้อความ */
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="welcome-text">
            Welcome, <span class="highlight">
                <?php 
                // ใช้ htmlspecialchars เพื่อความปลอดภัย (ป้องกัน XSS)
                echo isset($_GET["name"]) ? htmlspecialchars($_GET["name"]) : "Guest"; 
                ?>
            </span>
        </div>
        
        <div class="email-text">
            Your email address is: <br>
            <strong>
                <?php 
                echo isset($_GET["email"]) ? htmlspecialchars($_GET["email"]) : "Unknown"; 
                ?>
            </strong>
        </div>
    </div>

</body>
</html>