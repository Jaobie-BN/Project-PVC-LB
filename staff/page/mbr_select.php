<?php
$sql="SELECT id_mem, name_mem, dep_mem FROM member WHERE id_mem = '$id_mem'";
$result=mysqli_query($conn,$sql);
$record=mysqli_fetch_array($result);
$id_mem=$record[0];
$name_mem=$record[1];
$dep_mem=$record[2];
?>