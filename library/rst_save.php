<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/config.php";?>
<?php 
if(isset($_GET['mid'])){$mid=$_GET['mid'];}else{$mid="";}
if(isset($_GET['bid'])){$bid=$_GET['bid'];}else{$bid="";}

$sql="SELECT DATEDIFF(NOW(),tlend) FROM transections WHERE bid='$bid' AND mid='$mid' AND tstat='1'";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/connect.php";
$record=mysqli_fetch_array($result);
$numday=(int)$record[0];
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/unconn.php";

if($numday>7){
    $tstat=2;
}else{
    $tstat=0;
}

$sql="UPDATE transections SET trest=NOW(),tstat='$tstat' WHERE bid='$bid' AND mid='$mid' AND tstat='1'";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/connect.php";
if($result==1){
    $msg="การส่งคืนหนังสือเสร็จสิ้น";
    $v1=1;
    
}else{
    $msg="การส่งคืนหนังสือผิดพลาด";
    $v1=0;
}
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/unconn.php";

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
    <script>
        var v1=<?php echo($v1);?>;
        alert('<?php echo($msg);?>');
        if(v1==1){
            window.location.replace("mbr_detail.php?mid=<?php echo($mid);?>");
        }else{
            window.history.back();
        }
    </script>
</body>
</html>