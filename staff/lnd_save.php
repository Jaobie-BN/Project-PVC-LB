<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php 
if(isset($_POST['id_mem']))
{
    $id_mem=$_POST['id_mem'];
}
else
{
    $id_mem="";
}

if(isset($_POST['id_bk']))
{
    $id_bk=$_POST['id_bk'];
}
else
{
    $id_bk="";
}

$msg="";
$v1=0;

$sql="SELECT COUNT(id_bk) FROM books WHERE id_bk='$id_bk'";
$result=mysqli_query($conn,$sql);
$record=mysqli_fetch_array($result);
$bookrow=$record[0];

$sql2="SELECT COUNT(id_bk) FROM transection WHERE id_bk='$id_bk' AND id_mem='$id_mem' AND status_tran='1'";
$result2=mysqli_query($conn,$sql2);
$record2=mysqli_fetch_array($result2);
$lending=$record2[0];

$sql3="SELECT COUNT(id_mem) FROM transection WHERE id_mem='$id_mem' AND status_tran='1'";
$result3=mysqli_query($conn,$sql3);
$record3=mysqli_fetch_array($result3);
$holding=$record3[0];

if($bookrow<1){
    $msg="รหัสหนังสือไม่ถูกต้อง";
    $v1=0;
}elseif($lending>0){
    $msg="หนังสือเล่มนี้ถูกสมาชิกรายนี้ยืมอยู่แล้ว";
    $v1=0;
}elseif($holding>=3){
    $msg="สมาชิกรายนี้ยืมหนังสืออยู่ 3 เล่ม";
    $v1=0;
}else{
    $sql4="INSERT INTO transection(id_mem,id_bk,lend_tran,status_tran) VALUES('$id_mem','$id_bk',NOW(),'1')";
    $result4=mysqli_query($conn,$sql4);
    if($result4==1){
        $msg="การยืมหนังสือเสร็จสิ้น";
        $v1=1;
    }else{
        $msg="การยืมหนังสือผิดพลาด";
        $v1=0;
    }
    
}
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