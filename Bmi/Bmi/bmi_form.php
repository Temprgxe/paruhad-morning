<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ผลการคำนวณ BMI</title>
<style>
body{
    font-family: 'Segoe UI', Tahoma, sans-serif;
    /* ปรับพื้นหลังให้เข้ากับหน้าแรก */
    background: linear-gradient(135deg, #ff4d6d 0%, #ffccd5 100%);
    padding: 40px;
    min-height: 100vh;
}
.card{
    max-width: 600px;
    margin: auto;
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}
h2{
    text-align: center;
    color: #c9184a;
}
.data{
    line-height: 1.8;
    font-size: 18px;
    color: #333;
}
.bmi{
    font-size: 42px;
    font-weight: bold;
    /* ตัวเลข BMI สีแดงเด่น */
    color: #ff0054;
    text-align: center;
    margin: 20px 0;
    padding: 10px;
    background: #fff0f3;
    border-radius: 15px;
}
.back{
    text-align: center;
    margin-top: 30px;
}
.back a{
    padding: 12px 40px;
    background: #c9184a;
    color: white;
    border-radius: 12px;
    text-decoration: none;
    display: inline-block;
    transition: 0.3s;
}
.back a:hover{
    background: #800f2f;
}
</style>
</head>