<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php
    if(isset($_POST['search'])){
        $books_data = $_POST["books_data"];
        $sql = "SELECT * FROM 
        books WHERE id_bk LIKE '%$books_data%' 
        OR name_bk LIKE '%$books_data%' 
        OR id_cate LIKE '%$books_data%' 
        ORDER BY id_bk ASC";
        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);
        $order = 1;
    }else{
        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);
        $order = 1;
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

    <div class="row">

    </div>
    <div class="card mt-1">
        <div class="card-body">

            <form action="" method="POST" class="form-group my-3 needs-validation">
                <div class="row">
                    <div class="col-4">
                        <input type="text" placeholder=" กรอกข้อมูลที่ต้องการค้นหา" class="form-control"
                            name="books_data">
                    </div>
                    <div class="col-4">
                        <input type="submit" name="search" value="ค้นหา" class="btn btn-secondary w-25">
                    </div>
                    <div class="col-4 text-end">
                        <a href="../staff/dashboard.php?page=insert_books" class="btn btn-primary">เพิ่มหนังสือ</a>
                    </div>
                </div>
            </form>


            <table class="table table-striped table-hover table-bordered table-responsive bg-white rounded shadow-sm ">
                <thead>
                    <tr>
                        <th scope="col" class="text-center align-middle">#</th>
                        <th scope="col" class="text-center align-middle">เลขทะเบียน</th>
                        <th scope="col" class="text-center align-middle">เลขหมู่</th>
                        <th scope="col" class="text-center align-middle"">ชื่อหนังสือ</th>

                        <th scope="col" class="text-center align-middle">รายละเอียด</th>
                        <th scope="col" class="text-center align-middle" width="7.5%">แก้ไข</th>
                        <th scope="col" class="text-center align-middle" width="7.5%">ลบ</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if($count > 0) { ?>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo $order++;?></td>
                        <td class="text-center align-middle"><?php echo $row["id_bk"];?></td>
                        <td class="text-center align-middle"><?php echo $row["id_cate"];?></td>
                        <td class="align-middle"><?php echo $row["name_bk"];?></td>

                        <td class="text-center align-middle">
                            <a href="../staff/dashboard.php?page=view_books&id_bk=<?php echo $row["id_bk"];?>"
                                class="btn btn-info">
                                <i class="uil uil-search fs-5"></i>
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a href="../staff/dashboard.php?page=edit_books&id_bk=<?php echo $row['id_bk'];?>"
                                class="btn btn-warning">
                                <i class="uil uil-edit fs-5"></i>
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a href="?page=books&id_bk=<?php echo $row['id_bk'];?>&del=1>" class="btn btn-danger">
                                <?php
                                    if(isset($_GET['del'])){
                                        $id_bk2 = $_GET['id_bk'];
                                        $sql2 = "SELECT * FROM books WHERE id_bk='$id_bk2'";
                                        $result2 = mysqli_query($conn,$sql2);
                                        $row2 = mysqli_fetch_array($result2);
                                        $name_bk = $row2['name_bk'];
                                        echo "
                            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                            Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'คุณต้องการลบหนังสือ $name_bk หรือไม่',
                            showCancelButton: true,
                            confirmButtonColor: '#dc3545',
                            cancelButtonColor: '#adb5bd',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            window.location.href ='../staff/del.php?id_bk=$id_bk2'
                            }else{
                            window.location.href ='?page=books'
                        }
                    })
                    </script>";
                                    }
                                ?>
                                <i class="uil uil-trash-alt fs-5"></i>

                            </a>
                        </td>

                    </tr>
                    <?php }?>
                    <?php } else { ?>
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-danger text-center">
                                <b>ไม่มีข้อมูลของหนังสือ</b>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
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