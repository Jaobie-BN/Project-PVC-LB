<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php
    $id_bk = $_GET['id_bk'];
    $sql = "SELECT * FROM books where id_bk = '$id_bk'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
        
?>
<?php 
if(isset($_POST['edit'])){

    $name_bk = $_POST['name_bk'];
    $detail_bk = $_POST['detail_bk'];
    $id_cate = $_POST['id_cate'];
    $name_cate = $_POST['name_cate'];


    $check = "SELECT * FROM books WHERE id_bk = '$id_bk'";
    $query = mysqli_query($conn, $check);
        $sql2 = "UPDATE books SET name_bk = '$name_bk',detail_bk = '$detail_bk',id_cate = '$id_cate',name_cate = '$name_cate'
        WHERE id_bk = '$id_bk'";
        $query2 = mysqli_query($conn,$sql2);
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'แก้ไขข้อมูลสำเร็จ',
        showConfirmButton: false,
        timer: 1500
}).then((result) => {
    if (result) {
        window.location.href ='./dashboard.php?page=books'
        }
})
</script>";

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
                        <input type="text" class="form-control" name="name_bk" value="<?php echo $row['name_bk'];?>" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>เลขหมู่</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="id_cate" value="<?php echo $row['id_cate'];?>" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อหมู่</center>
                    </th>
                    <td><input type="text" class="form-control" name="name_cate" value="<?php echo $row['name_cate'];?>" required></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ลายละเอียด</center>
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="detail_bk" row="5" required><?php echo $row['detail_bk'];?></textarea>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <center>
                            <input type="submit" class="btn btn-warning w-25" name="edit" value="แก้ไขข้อมูล">
                            <a href="../staff/dashboard.php?page=books"
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