<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/config.php";?>
<?php 
if(isset($_GET['mid'])){$mid=$_GET['mid'];}else{$mid="";}
if(isset($_GET['bid'])){$bid=$_GET['bid'];}else{$bid="";}
if(isset($_GET['tlend'])){$tlend=$_GET['tlend'];}else{$tlend="";}

$sql="UPDATE transections SET tstat='0' WHERE bid='$bid' AND mid='$mid' AND tlend='$tlend'";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/connect.php";
if($result==1){
    $msg="การชำระค่าปรับเสร็จสิ้น";
    $v1=1;
}else{
    $msg="การชำระค่าปรับผิดพลาด";
    $v1=0;
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