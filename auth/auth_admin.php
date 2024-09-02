<?php
session_start();
if($_SESSION['level_mem']){
    if($_SESSION['level_mem']=='admin'){
        
    }else{
        if($_SESSION['level_mem']=='main_admin'){
        
        }else{
            session_destroy();
            header("Location: /user63202040097/index.php");
            
        } 
    } 

}else{
    session_destroy();
    header("Location: /user63202040097/index.php");
    
}
?>