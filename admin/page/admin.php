<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php
    if(isset($_POST['search'])){
        $admin_data = $_POST["admin_data"];
        $sql = "SELECT * FROM 
        member WHERE level_mem ='staff'
        AND id_mem LIKE  '%$admin_data%'
        OR level_mem ='staff'
        AND name_mem LIKE  '%$admin_data%' 
        OR level_mem ='staff'
        AND dep_mem LIKE  '%$admin_data%' 
        OR level_mem ='staff'
        AND status_mem LIKE  '%$admin_data%'
        OR level_mem ='admin'
        AND id_mem LIKE  '%$admin_data%'
        OR level_mem ='admin'
        AND name_mem LIKE  '%$admin_data%' 
        OR level_mem ='admin'
        AND dep_mem LIKE  '%$admin_data%' 
        OR level_mem ='admin'
        AND status_mem LIKE  '%$admin_data%'
        ORDER BY id_mem ASC";
        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);
        $order = 1;
    }else{
        $sql = "SELECT * FROM member where level_mem ='admin' OR level_mem ='staff'";
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
                            name="admin_data" required>
                    </div>
                    <div class="col-4">
                        <input type="submit" name="search" value="ค้นหา" class="btn btn-secondary w-25">
                    </div>
                    <div class="col-4 text-end">
                        <a href="../admin/dashboard.php?page=add_admin" class="btn btn-primary">เพิ่มแอดมิน</a>
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
                            <a href="../admin/dashboard.php?page=admin_edit&id_mem=<?php echo $row["id_mem"];?>"
                                class="btn btn-warning">
                                <i class="uil uil-edit fs-5"></i>
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a href="../admin/del.php?id_mem=<?php echo $row["id_mem"];?>" class="btn btn-danger">
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