<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนอบรม</title>
    <style>
        /* ตกแต่งพื้นหลังและฟอนต์ */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }

        /* ตกแต่งการ์ดฟอร์ม */
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        h2, h3 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        /* ตกแต่งช่องกรอกข้อมูล */
        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* ป้องกันขนาดเกินคอนเทนเนอร์ */
        }

        /* ตกแต่งปุ่ม */
        button {
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* ตกแต่งตาราง */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: #3498db;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        /* ส่วนแสดงผลสำเร็จ */
        .result-box {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>ฟอร์มลงทะเบียนอบรม</h2>
    <form method="post">
        <strong>ชื่อ-นามสกุล:</strong><br>
        <input type="text" name="fullname" placeholder="กรุณากรอกชื่อ-นามสกุล" required><br><br>

        <strong>Email:</strong><br>
        <input type="email" name="email" placeholder="example@mail.com" required><br><br>

        <strong>หัวข้ออบรม:</strong><br>
        <select name="course">
            <option value="AI สำหรับงานสำนักงาน">AI สำหรับงานสำนักงาน</option>
            <option value="Excel สำหรับการทำงาน">Excel สำหรับการทำงาน</option>
            <option value="การเขียนเว็บด้วย PHP">การเขียนเว็บด้วย PHP</option>
        </select><br><br>

        <strong>อาหารที่ต้องการ:</strong><br>
        <input type="checkbox" name="food[]" value="ปกติ"> ปกติ
        <input type="checkbox" name="food[]" value="มังสวิรัติ"> มังสวิรัติ
        <input type="checkbox" name="food[]" value="ฮาลาล"> ฮาลาล
        <br><br>

        <strong>รูปแบบการเข้าร่วม:</strong><br>
        <input type="radio" name="type" value="Onsite" required> Onsite
        <input type="radio" name="type" value="Online"> Online
        <br><br>

        <button type="submit" name="submit">ลงทะเบียนใช้งาน</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $type = $_POST['type'];
        
        if (isset($_POST['food'])) {
            $food = implode(",", $_POST['food']);
        } else {
            $food = "ไม่ระบุ";
        }

        if ($type == "Onsite") {
            $price = 1500;
        } else {
            $price = 800;
        }

        $data = $fullname . "|" . $email . "|" . $course . "|" . $food . "|" . $type . "|" . $price . "\n";
        file_put_contents("register.txt", $data, FILE_APPEND);

        echo "<div class='result-box'>";
        echo "<h3>ลงทะเบียนสำเร็จ</h3>";
        echo "<b>ชื่อ:</b> $fullname | <b>อีเมล:</b> $email<br>";
        echo "<b>หัวข้อ:</b> $course | <b>รูปแบบ:</b> $type<br>";
        echo "<b>ค่าลงทะเบียน:</b> " . number_format($price, 2) . " บาท";
        echo "</div>";
    }
    ?>
</div>

<div class="container">
    <h3>รายชื่อผู้ลงทะเบียนทั้งหมด</h3>
    <?php
    if (file_exists("register.txt")) {
        $lines = file("register.txt");
        echo "<table>";
        echo "<thead><tr>
                <th>ชื่อ</th>
                <th>Email</th>
                <th>หัวข้อ</th>
                <th>อาหาร</th>
                <th>รูปแบบ</th>
                <th>ราคา</th>
              </tr></thead><tbody>";
        foreach ($lines as $line) {
            $clean_line = trim($line);
            if (!empty($clean_line)) {
                list($_name, $_email, $_course, $_food, $_type, $_price) = explode("|", $clean_line);
                echo "<tr>
                        <td>$_name</td>
                        <td>$_email</td>
                        <td>$_course</td>
                        <td>$_food</td>
                        <td>$_type</td>
                        <td>" . number_format($_price, 2) . "</td>
                      </tr>";
            }
        }
        echo "</tbody></table>";
    } else {
        echo "<p style='color: #666;'>ยังไม่มีข้อมูลการลงทะเบียน</p>";
    }
    ?>
</div>



</body>
</html>