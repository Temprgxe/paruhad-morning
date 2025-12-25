<?php
// ===== Function คำนวณ BMI =====
function calculateBMI($weight, $height_cm){
    $height_m = $height_cm / 100;
    return $weight / ($height_m * $height_m);
}

// ===== Function แปลผล BMI =====
function bmiResult($bmi){
    if ($bmi < 18.5)
        return ["น้ำหนักน้อย / ผอม", "ควรรับประทานอาหารให้ครบ 5 หมู่ และเพิ่มพลังงาน"];
    elseif ($bmi < 23)
        return ["ปกติ", "สุขภาพดี ควรรักษาน้ำหนักให้อยู่ในเกณฑ์นี้"];
    elseif ($bmi < 25)
        return ["ท้วม", "ควรเริ่มควบคุมอาหารและออกกำลังกาย"];
    elseif ($bmi < 30)
        return ["อ้วนระดับ 1", "เสี่ยงต่อโรค ควรควบคุมน้ำหนักอย่างจริงจัง"];
    else
        return ["อ้วนระดับ 2", "เสี่ยงสูง ควรพบแพทย์หรือผู้เชี่ยวชาญ"];
}

// ===== รับค่าจาก Form =====
$fullname = $_POST['fullname'];
$birthdate = $_POST['birthdate'];
$weight = $_POST['weight'];
$height = $_POST['height'];

// ===== คำนวณอายุ =====
$birth = new DateTime($birthdate);
$today = new DateTime();
$age = $today->diff($birth);

// ===== คำนวณ BMI =====
$bmi = calculateBMI($weight, $height);
$result = bmiResult($bmi);
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ผลการคำนวณ BMI</title>
<style>
body{
    font-family: 'Segoe UI', Tahoma;
    background: linear-gradient(135deg,#ffd6a5,#fdffb6);
    padding:40px;
}
.card{
    max-width:600px;
    margin:auto;
    background:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 10px 30px rgba(255, 0, 0, 0.2);
}
h2{
    text-align:center;
    color:#e76f51;
}
.data{
    line-height:1.8;
    font-size:18px;
}
.bmi{
    font-size:32px;
    color:#2a9d8f;
    text-align:center;
    margin:20px 0;
}
.back{
    text-align:center;
    margin-top:30px;
}
.back a{
    padding:12px 30px;
    background:#2a9d8f;
    color:white;
    border-radius:12px;
    text-decoration:none;
}
</style>
</head>

<body>
<div class="card">
<h2>ผลการประเมิน BMI</h2>

<div class="data">
<strong>ชื่อ - สกุล:</strong> <?= $fullname ?><br>
<strong>อายุ:</strong> <?= $age->y ?> ปี <?= $age->m ?> เดือน <?= $age->d ?> วัน<br>
<strong>น้ำหนัก:</strong> <?= $weight ?> กก.<br>
<strong>ส่วนสูง:</strong> <?= $height ?> ซม.<br>
</div>

<div class="bmi">
BMI = <?= number_format($bmi,2) ?>
</div>

<div class="data">
<strong>ผลการประเมิน:</strong> <?= $result[0] ?><br>
<strong>คำแนะนำ:</strong> <?= $result[1] ?>
</div>

<div class="back">
<a href="bmi_form.php">คำนวณใหม่</a>
</div>
</div>
</body>
</html>
