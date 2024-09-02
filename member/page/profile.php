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
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">

    <title>Library</title>
</head>

<body>
    <form action="./dashboard.php?page=profile_edit" method="POST">
        <table class="table table-bordered table-responsive bg-white rounded shadow-sm ">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="fs-3" ><center>โปรไฟล์</center></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" width="30%" class="align-middle"><center>รหัสนักศึกษา</center></th>
                    <td><input type="text" class="form-control" name="id_mem" value="<?php echo $row['id_mem']; ?>" disabled></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle"><center>ชื่อผู้ใช้</center></th>
                    <td><input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" disabled></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle"><center>ชื่อ-สกุล</center></th>
                    <td><input type="text" class="form-control" name="name_mem" value="<?php echo $row['name_mem']; ?>" disabled></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle"><center>แผนก/ชั้น</center></th>
                    <td><input type="text" class="form-control" name="dep_mem" value="<?php echo $row['dep_mem']; ?>" disabled></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle"><center>สถานะภาพ</center></th>
                    <td><input type="text" class="form-control" name="status_mem" value="<?php echo $row['status_mem']; ?>" disabled></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
<!-- Custom JS -->
<script src="../../assets/js/bootstrap.bundle.js"></script>
<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};
</script>

</html>