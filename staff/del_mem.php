<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php

$id_mem = $_GET["id_mem"];
$sql = "DELETE FROM member WHERE id_mem = '$id_mem'";
$result = mysqli_query($conn,$sql);

if($result){
    header("location: dashboard.php?page=report_member");
} else {
    echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขี้น";
}

?>