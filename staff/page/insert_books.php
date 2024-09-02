<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php 
error_reporting(E_ERROR | E_PARSE);
$query3 = "SELECT id_bk FROM books ORDER BY id_bk DESC";
$result3 = mysqli_query($conn,$query3);
$row3 = mysqli_fetch_array($result3);
$query4 = "SELECT id_bk FROM books WHERE id_bk='000001' ORDER BY id_bk DESC";
$result4 = mysqli_query($conn,$query4);
$row4 = mysqli_fetch_array($result4);
$checkid = $row4['id_bk'];
$lastid = $row3['id_bk'];

if(empty($lastid)){
    $number = "000001";
} elseif(empty($checkid)){
    $number = "000001";
} else {
    $idd = str_replace("","",$lastid);
    $id =str_pad($idd + 1, 6,0, STR_PAD_LEFT);
    $number = $id;
}
?>
<?php 
if(isset($_POST['save'])){

    $id_bk = $number;
    $name_bk = $_POST['name_bk'];
    $detail_bk = $_POST['detail_bk'];
    $id_cate = $_POST['id_cate'];
    $name_cate = $_POST['name_cate'];

    $check = "SELECT * FROM books WHERE id_bk = '$id_bk'";
    $query = mysqli_query($conn, $check);

    if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO books(id_bk,name_bk,detail_bk,id_cate,name_cate)
        VALUE('$id_bk','$name_bk','$detail_bk','$id_cate','$name_cate')";
        $query2 = mysqli_query($conn,$sql);
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'เพิ่มหนังสำเร็จ',
        showConfirmButton: false,
        timer: 1500
}).then((result) => {
    if (result) {
        window.location.href ='../staff/dashboard.php?page=books'
        }
})
</script>";
        //header('Location: ../staff/dashboard.php?page=books');
    }else{
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'เพิ่มหนังไม่สำเร็จ',
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

    <form action="./dashboard.php?page=insert_books" method="POST" class="needs-validation">
        <table class="table table-bordered table-responsive bg-white rounded shadow-sm ">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="fs-3">
                        <center>ฟอร์มเพิ่มข้อมูลหนังสือ</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="align-middle" width="30%">
                        <center>เลขทะเบียน</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="id_bk" value="<?php echo $number;?>" disabled required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อหนังสือ</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="name_bk" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>เลขหมู่</center>
                    </th>
                    <td>
                        <input type="text" class="form-control" name="id_cate" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ชื่อหมู่</center>
                    </th>
                    <td><input type="text" class="form-control" name="name_cate" required></td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">
                        <center>ลายละเอียด</center>
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="detail_bk" row="5" required></textarea>
                    </td>
                </tr>
                
                <tr>
                    <th colspan="2">
                        <center>
                            <input type="submit" class="btn btn-success w-25" name="save" value="เพิ่มหนังสือ">
                            <a href="../staff/dashboard.php?page=books"
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