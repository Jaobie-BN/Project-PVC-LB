<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php 
if(isset($_GET['id_mem'])){$id_mem=$_GET['id_mem'];}else{$id_mem="";}
if(isset($_GET['id_bk'])){$id_bk=$_GET['id_bk'];}else{$id_bk="";}
if(isset($_GET['lend_tran'])){$lend_tran=$_GET['lend_tran'];}else{$lend_tran="";}

$sql="UPDATE transection SET status_tran='0' WHERE id_bk='$id_bk' AND id_mem='$id_mem' AND lend_tran='$lend_tran'";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
$result=mysqli_query($conn,$sql);
if($result==1){
    $msg="การชำระค่าปรับเสร็จสิ้น";
    $v1=1;
}else{
    $msg="การชำระค่าปรับผิดพลาด";
    $v1=0;
}
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        <?php echo($id_mem);?>;
        var v1=<?php echo($v1);?>;
        if(v1==1){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?php echo($msg);?>',
            showConfirmButton: false,
            timer: 2000
        }).then((result) => {
            if (result) {
                window.location.replace("dashboard.php?page=view_member&id_mem=<?php echo($id_mem);?>");
            }
        })
        }else{
            Swal.fire({
            position: 'center',
            icon: 'warning',
            title: '<?php echo($msg);?>',
            showConfirmButton: false,
            timer: 2000
        }).then((result) => {
            if (result) {
                window.history.back();
            }
        })
        }
    </script>
</body>
</html>