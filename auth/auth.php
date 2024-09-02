<?php
session_start();
if($_SESSION['level_mem']){
    if($_SESSION['level_mem']=='main_admin'){
        header("Location: /user63202040097/admin/dashboard.php");
    }
    if($_SESSION['level_mem']=='admin'){
        header("Location: /user63202040097/admin/dashboard.php");
    }
    if($_SESSION['level_mem']=='staff'){
        header("Location: /user63202040097/staff/dashboard.php");
    }
    if($_SESSION['level_mem']=='member'){
        header("Location: /user63202040097/member/dashboard.php");
    }
}else{
    session_destroy();
    header("Location: /user63202040097/index.php");
}
?>