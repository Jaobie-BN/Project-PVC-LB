<?php
$sql="SELECT mid, mname, mdep FROM members WHERE mid = '$mid'";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/connect.php";
$record=mysqli_fetch_array($result);
$mid=$record[0];
$mname=$record[1];
$mdep=$record[2];
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/unconn.php";
?>