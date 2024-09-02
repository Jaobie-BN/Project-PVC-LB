<?php
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/config.php";
$sql="SELECT mid, mname, mdep FROM members";
if(isset($_GET['kw'])){
    $kw=$_GET['kw'];
    $sql.=" WHERE mid ='$kw' OR mname LIKE'%$kw%'";
}else{
    $kw="";
    $sql.=" WHERE mid IS NULL";
}
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/connect.php";

?>
<form action="mbr_list.php" method="get" target="_self">
    Search :
    <input type="text" name="kw" id="kw" value="<?php echo($kw);?>">
    <input type="submit" name="submit" value="OK">
</form>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Department</td>
    </tr>
    <?php
         while($record=mysqli_fetch_array($result)){?>
    <tr>
        <td><a href="mbr_detail.php?mid=<?php echo($record[0]);?>"><?php echo($record[0]);?></a></td>
        <td><?php echo($record[1]);?></td>
        <td><?php echo($record[2]);?></td>
    </tr>
    <?php
        }
        require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/unconn.php";
        ?>
</table>