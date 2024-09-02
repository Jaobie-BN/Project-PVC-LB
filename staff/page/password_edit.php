<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php
    $id_mem = $_SESSION['id_mem'];
    $sql = "SELECT * FROM member where id_mem = '$id_mem'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <title>Library</title>
</head>

<body>

<?php
        if(isset($_POST['edit'])){
            $id_mem = $_SESSION['id_mem'];
            $password = $_POST['password'];
            if($password == ""){
                echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'เกิดข้อผิดพลาด',
        showConfirmButton: false,
        timer: 1500
})
</script>";
                //header('Refresh:0; url=./dashboard.php?page=password_edit');
            } else {
                $sql2 = "UPDATE member set password = '$password' WHERE id_mem = '$id_mem'";
                mysqli_query($conn,$sql2);
                echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'เปลี่ยนรหัสผ่านสำเร็จ',
        showConfirmButton: false,
        timer: 1500
})
</script>";
            }
            
        }
    ?>
    <form action="./dashboard.php?page=password_edit" method="POST" class="needs-validation">
        <table class="table table-bordered table-responsive bg-white rounded shadow-sm ">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="fs-3">
                        <center>ฟอร์มแก้ไขรหัสผ่าน</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="align-middle" width="30%">
                        <center>ชื่อ-สกุล</center>
                    </th>
                    <td><input type="text" class="form-control" name="name_mem" value="<?php echo $row['name_mem']; ?>"
                            disabled></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อผู้ใช้</center>
                    </th>
                    <td><input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>"
                            disabled></td>
                </tr>

                <tr>
                    <th scope="row" class="align-middle">
                        <center>รหัสผ่านใหม่</center>
                    </th>
                    <td><input type="password" class="form-control" name="password" value="" ></td>
                </tr>
                <tr>
                    <th colspan="2">
                        <center><input type="submit" class="btn btn-danger w-50" name="edit" value="แก้ไข"></center>
                    </th>
                </tr>
            </tbody>
        </table>
    </form>
    
</body>
<!-- Custom JS -->
<script src="../assets/js/bootstrap.bundle.js"></script>
<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};
</script>

</html>