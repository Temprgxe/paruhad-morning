<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Thanachit Thawila\n";
fwrite($myfile, $txt);
$txt = "ธนชิต ทวิลา";
fwrite($myfile, $txt);
fclose($myfile);
echo บันทึกข้อมูลเรียบร้อย
?>