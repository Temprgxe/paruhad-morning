<?php
// เมื่อกดส่งฟอร์ม
if (isset($_POST['message'])) {

    $message = $_POST['message'];
    $filename = "data.txt";

    // ข้อความที่จะบันทึก
    $text = date("Y-m-d H:i:s") . " : " . $message . PHP_EOL;

    // เขียนต่อท้ายไฟล์
    file_put_contents($filename, $text, FILE_APPEND | LOCK_EX);

    $success = "บันทึกข้อมูลเรียบร้อย";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Append to File</title>
</head>
<body>

<h2>บันทึกข้อมูลลงไฟล์ (Append)</h2>

<?php
if (isset($success)) {
    echo "<p style='color:green;'>$success</p>";
}
?>

<form method="post">
    <label>ข้อความที่ต้องการบันทึก:</label><br>
    <textarea name="message" rows="4" cols="40" required></textarea><br><br>
    <button type="submit">บันทึก</button>
</form>

</body>
</html>
