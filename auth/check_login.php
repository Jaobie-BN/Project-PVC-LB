<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php 
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['btn_login']) && $username && $password){

    $query = "SELECT * FROM member WHERE username='$username' AND password='$password' ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1){
        
        $row = mysqli_fetch_array($result);
        $_SESSION['id_mem'] = $row['id_mem'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['name_mem'] = $row['name_mem'];
        $_SESSION['level_mem'] = $row['level_mem'];
        switch($_SESSION['level_mem']){
            case "main_admin":
                header('Location: ../admin/dashboard.php');
                break;
            case "admin":
                header('Location: ../admin/dashboard.php');
                break;
            case "staff":
                header('Location: ../staff/dashboard.php');
                break;
            case "member":
                header('Location: ../member/dashboard.php');
                break;
            default:
                header('Location: ../index.php');
                
                break;
        }


    } else {
        $_SESSION['error'] = "<div class='alert alert-danger' role='alert'> ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง </div>";
        header('Location: ../index.php');

    }

} else {
    header('Location: ../index.php');
}

?>