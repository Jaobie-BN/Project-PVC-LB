<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php
    $id_bk = $_GET['id_bk'];
    $sql = "SELECT * FROM books where id_bk = '$id_bk'";
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

    <div class="row">

    </div>
    <div class="card mt-1">
        <div class="card-body">

            <table class="table table-bordered table-responsive bg-white rounded shadow-sm ">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="fs-3">
                        <center>รายละเอียดหนังสือ</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="align-middle" width="30%">
                        <center>เลขทะเบียน</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="id_bk" value="<?php echo $row['id_bk'];?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อหนังสือ</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="name_bk" value="<?php echo $row['name_bk'];?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>เลขหมู่</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="id_cate" value="<?php echo $row['id_cate'];?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อหมู่</center>
                    </th>
                    <td><input type="text" class="form-control" name="name_cate" value="<?php echo $row['name_cate'];?>" disabled></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ลายละเอียด</center>
                    </th>
                    <td>
                        <textarea type="text" style="height: 200px;" class="form-control" name="detail_bk" row="5" disabled><?php echo $row['detail_bk'];?></textarea>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <center>
                            <a href="../staff/dashboard.php?page=books"
                                class="btn btn-outline-danger w-25">กลับ</a>
                        </center>
                    </th>
                </tr>
            </tbody>
        </table>
        </div>
    </div>



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