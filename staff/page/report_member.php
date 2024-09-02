<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php
    if(isset($_POST['search'])){
        $member_data = $_POST["member_data"];
        $sql = "SELECT * FROM 
        member WHERE level_mem ='member'
        AND id_mem LIKE  '%$member_data%'
        OR level_mem ='member'
        AND name_mem LIKE  '%$member_data%' 
        OR level_mem ='member'
        AND dep_mem LIKE  '%$member_data%' 
        OR level_mem ='member'
        AND status_mem LIKE  '%$member_data%'
        ORDER BY id_mem ASC";
        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);
        $order = 1;
    }else{
        $sql = "SELECT * FROM member where level_mem ='member'";
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
                        <input type="text" placeholder="กรอกข้อมูลที่ต้องการค้นหา" class="form-control"
                            name="member_data">
                    </div>
                    <div class="col-4">
                        <input type="submit" name="search" value="ค้นหา" class="btn btn-secondary w-25">
                    </div>
                    <div class="col-4 text-end">
                        <a href="../staff/dashboard.php?page=insert_member" class="btn btn-primary">เพิ่มสมาชิก</a>
                    </div>
                </div>
            </form>


            <table class="table table-striped table-hover table-bordered table-responsive bg-white rounded shadow-sm ">
                <thead>
                    <tr>
                        <th scope="col" class="text-center align-middle">#</th>
                        <th scope="col" class="text-center align-middle">รหัสสมาชิก</th>
                        <th scope="col" class="text-center align-middle" width="30%">ชื่อ - สกุล</th>
                        <th scope="col" class="text-center align-middle">ระดับชั้น/แผนก</th>
                        <th scope="col" class="text-center align-middle">สถานะภาพ</th>
                        <th scope="col" class="text-center align-middle" width="7.5%">ข้อมูล</th>
                        <th scope="col" class="text-center align-middle" width="7.5%">แก้ไข</th>
                        <th scope="col" class="text-center align-middle" width="7.5%">ลบ</th>

                    </tr>
                </thead>

                <tbody>
                    <?php if($count > 0) { ?>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo $order++;?></td>
                        <td class="align-middle"><?php echo $row["id_mem"];?></td>
                        <td class="align-middle"><?php echo $row["name_mem"];?></td>
                        <td class="align-middle"><?php echo $row["dep_mem"];?></td>
                        <td class="text-center align-middle"><?php echo $row["status_mem"];?></td>
                        <td class="text-center align-middle">
                            <a href="../staff/dashboard.php?page=view_member&id_mem=<?php echo $row["id_mem"];?>"
                                class="btn btn-info">
                                <i class="uil uil-search fs-5"></i>
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a href="../staff/dashboard.php?page=edit_member&id_mem=<?php echo $row["id_mem"];?>"
                                class="btn btn-warning">
                                <i class="uil uil-edit fs-5"></i>
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a href="?page=report_member&del=1>" class="btn btn-danger">
                                <?php
                                    if(isset($_GET['del'])){
                                        echo "
                            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                            Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'คุณต้องการลบสมาชิก $row[id_mem] หรือไม่',
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
                            window.location.href ='../staff/del.php?id_mem=$row[id_mem]'
                            }else{
                            window.location.href ='?page=report_member'
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
                                <b>ไม่มีข้อมูลของสมาชิก</b>
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