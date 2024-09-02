<?php
session_start();
if($_SESSION['level_mem']){
    if($_SESSION['level_mem']=='member'){
        
    }else{
        session_destroy();
        header("Location: /user63202040097/index.php");
        
    }
}else{
    session_destroy();
    header("Location: /user63202040097/index.php");
    
}
?>