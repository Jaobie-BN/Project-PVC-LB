<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php 
if(isset($_POST['save'])){

    $id_mem = $_POST['id_mem'];
    $name_mem = $_POST['name_mem'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dep_mem = $_POST['dep_mem'];
    $status_mem = $_POST['status_mem'];
    $level_mem = $_POST['level_mem'];

    $check = "SELECT * FROM member WHERE id_mem = '$id_mem' or username = '$username'";
    $query = mysqli_query($conn, $check);

    if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO member(id_mem,name_mem,username,password,dep_mem,status_mem,level_mem)
        VALUE('$id_mem','$name_mem','$username','$password','$dep_mem','$status_mem','$level_mem')";
        $query2 = mysqli_query($conn,$sql);
        header('Refresh:0; url=../admin/dashboard.php?page=admin');
    }
}
    


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

    <form action="" method="POST" class="needs-validation">
        <table class="table table-bordered table-responsive bg-white rounded shadow-sm ">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="fs-3">
                        <center>ฟอร์มเพิ่มข้อมูลบุคลากร</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="align-middle" width="30%">
                        <center>รหัสสมาชิก</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="id_mem" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อ-สกุล</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="name_mem" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อผู้ใช้</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="username" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>รหัสผ่าน</center>
                    </th>
                    <td><input type="text" class="form-control" name="password" required></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชั้น/แผนก</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="dep_mem" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>สถานะภาพ</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="status_mem" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>สถานะบุคลากร</center>
                    </th>
                    <td>
                        <select name="level_mem" class="form-select">
                            <option value="staff">บรรณารักษ์</option>
                            <option value="admin">แอดมิน</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <th colspan="2">
                        <center>
                            <input type="submit" class="btn btn-success w-25" name="save" value="เพิ่มบุคลากร">
                            <a href="../admin/dashboard.php?page=admin"
                                class="btn btn-outline-secondary w-25">ยกเลิก</a>
                        </center>
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

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>

</html>