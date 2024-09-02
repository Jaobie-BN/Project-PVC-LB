<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php


if(isset($_GET['id_mem'])){
    $id_mem = $_GET["id_mem"];
    $sql = "DELETE FROM member WHERE id_mem='$id_mem'";
    $result = mysqli_query($conn,$sql,$sql2);

    if($result){
        header("location: dashboard.php?page=report_member");
    } else {
        echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขี้น";
    }
}

if(isset($_GET['id_bk'])){
    $id_bk = $_GET["id_bk"];
    $sql = "DELETE FROM books WHERE id_bk='$id_bk'";
    $result = mysqli_query($conn,$sql);

    if($result){
        header("location: dashboard.php?page=books");
    } else {
        echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขี้น";
    }
}
?>