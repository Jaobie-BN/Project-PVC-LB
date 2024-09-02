<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php
    $id_mem = $_GET['id_mem'];
    $sql = "SELECT * FROM member where id_mem = '$id_mem'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
        
?>
<?php 
if(isset($_POST['edit'])){

    $id_mem2 = $_POST['id_mem'];
    $name_mem = $_POST['name_mem'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dep_mem = $_POST['dep_mem'];
    $status_mem = $_POST['status_mem'];


    $check = "SELECT * FROM member WHERE id_mem = '$id_mem2'";
    $query = mysqli_query($conn, $check);
        $sql2 = "UPDATE member SET id_mem = '$id_mem2', name_mem = '$name_mem',username = '$username',password = '$password',dep_mem = '$dep_mem',status_mem = '$status_mem'
        WHERE id_mem = '$id_mem'";
        $query2 = mysqli_query($conn,$sql2);
        header('Refresh:0; url=./dashboard.php?page=report_member');
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
                        <input type="text" class="form-control" name="id_mem" value="<?php echo $row['id_mem'];?>" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อ-สกุล</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="name_mem" value="<?php echo $row['name_mem'];?>" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อผู้ใช้</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>รหัสผ่าน</center>
                    </th>
                    <td><input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>" required></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชั้น/แผนก</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="dep_mem" value="<?php echo $row['dep_mem'];?>" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>สถานะภาพ</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="status_mem" value="<?php echo $row['status_mem'];?>" required>
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
                            <input type="submit" class="btn btn-warning w-25" name="edit" value="แก้ไขข้อมูล">
                            <a href="../staff/dashboard.php?page=report_member"
                                class="btn btn-secondary w-25">ยกเลิก</a>
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