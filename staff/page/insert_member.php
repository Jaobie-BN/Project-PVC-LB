<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php 
if(isset($_POST['save'])){

    $id_mem = $_POST['id_mem'];
    $name_mem = $_POST['name_mem'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dep_mem = $_POST['dep_mem'];
    $status_mem = $_POST['status_mem'];

    $check = "SELECT * FROM member WHERE id_mem = '$id_mem' or username = '$username'";
    $query = mysqli_query($conn, $check);

    if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO member(id_mem,name_mem,username,password,dep_mem,status_mem,level_mem)
        VALUE('$id_mem','$name_mem','$username','$password','$dep_mem','$status_mem','member')";
        $query2 = mysqli_query($conn,$sql);
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'เพิ่มสมาชิกสำเร็จ',
        showConfirmButton: false,
        timer: 1500
}).then((result) => {
    if (result) {
        window.location.href ='../staff/dashboard.php?page=report_member'
        }
})
</script>";
        //header('Refresh:0; url=../staff/dashboard.php?page=report_member');
    }else{
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'เพิ่มสมาชิกไม่สำเร็จ',
        showConfirmButton: false,
        timer: 1500
})
</script>";
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

    <form action="./dashboard.php?page=insert_member" method="POST" class="needs-validation">
        <table class="table table-bordered table-responsive bg-white rounded shadow-sm ">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="fs-3">
                        <center>ฟอร์มเพิ่มข้อมูลสมาชิก</center>
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
                        <center>สถานะสมาชิก</center>
                    </th>
                    <td>
                        <select name="level_mem" class="form-select" disabled>
                            <option value="member">สมาชิก</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <th colspan="2">
                        <center>
                            <input type="submit" class="btn btn-success w-25" name="save" value="เพิ่มสมาชิก">
                            <a href="../staff/dashboard.php?page=report_member"
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