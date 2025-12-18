<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>โปรแกรมคำนวณ BMI</title>
<style>
body{
    font-family: 'Segoe UI', Tahoma, sans-serif;
    /* ปรับพื้นหลังเป็นโทนแดง-ชมพู */
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    padding: 40px;
    min-height: 100vh;
}
.container{
    max-width: 500px;
    margin: auto;
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(186, 45, 45, 0.2);
}
h2{
    text-align: center;
    /* หัวข้อสีแดงเข้ม */
    color: #d00000;
}
label{
    font-weight: bold;
    color: #4a4a4a;
}
input{
    width: 100%;
    padding: 10px;
    margin: 8px 0 15px 0;
    border-radius: 10px;
    /* ขอบ Input สีแดงอ่อน */
    border: 1px solid #ffccd5;
    box-sizing: border-box;
}
input:focus{
    outline: none;
    border-color: #ff4d6d;
}
.btn-group{
    display: flex;
    justify-content: space-between;
}
button{
    width: 48%;
    padding: 12px;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}
.submit{
    /* ปุ่มส่งสีแดงหลัก */
    background: #ff4d6d;
    color: white;
}
.submit:hover{
    background: #c9184a;
}
.clear{
    /* ปุ่มล้างค่าสีเทาอมแดง */
    background: #adb5bd;
    color: white;
}
.clear:hover{
    background: #6c757d;
}
</style>
</head>

<body>
<div class="container">
<h2>โปรแกรมคำนวณดัชนีมวลกาย (BMI)</h2>

<form action="bmi_result.php" method="post">

<label>ชื่อ - สกุล</label>
<input type="text" name="fullname" required>

<label>วันเกิด</label>
<input type="date" name="birthdate" required>

<label>น้ำหนัก (กิโลกรัม)</label>
<input type="number" name="weight" step="0.1" required>

<label>ส่วนสูง (เซนติเมตร)</label>
<input type="number" name="height" required>

<div class="btn-group">
<button type="submit" class="submit">Submit</button>
<button type="reset" class="clear">Clear</button>
</div>

</form>
</div>
</body>
</html>
