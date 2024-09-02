<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php
error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['search'])){
        $history_data = $_POST["history_data"];
        $sql = "SELECT * FROM 
        transection WHERE id_mem LIKE  '%$history_data%'
        OR id_bk LIKE  '%$history_data%'
        ORDER BY rest_tran DESC";
        $result = mysqli_query($conn,$sql);
        
        $count = mysqli_num_rows($result);
    }else{
        $sql = "SELECT * FROM transection WHERE id_mem= $_SESSION[id_mem] ORDER BY rest_tran DESC";
        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);
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

            <form action="" method="POST" class="input-group my-3 needs-validation">
                
                        <input type="text" placeholder="กรอก (รหัสสมาชิก หรือ เลขทะเบียนหนังสือ) ที่ต้องการค้นหา" class="form-control"
                            name="history_data">
                    
                        <input type="submit" name="search" value="ค้นหา" class="btn btn-secondary w-25">
                    
            </form>


            <table class="table table-striped table-hover table-bordered table-responsive bg-white rounded shadow-sm ">
                <thead>
                    <tr>
                        <th scope="col" class="text-center align-middle">รหัสสมาชิก</th>
                        <th scope="col" class="text-center align-middle">เลขทะเบียนหนังสือ</th>
                        <th scope="col" class="text-center align-middle">วันที่ยืม</th>
                        <th scope="col" class="text-center align-middle">วันที่คืน</th>
                        <th scope="col" class="text-center align-middle">สถานะ</th>

                    </tr>
                </thead>

                <tbody>
                    <?php if($count > 0) { ?>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo $row["id_mem"];?></td>
                        <td class="text-center align-middle"><?php echo $row["id_bk"];?></td>
                        <td class="text-center align-middle"><?php echo date_format(date_create($row["lend_tran"]),"d/m/Y");?></td>
                        <td class="text-center align-middle">
                            <?php 
                            switch($row['status_tran']){
                                case "0":echo date_format(date_create($row["rest_tran"]),"d/m/Y"); break;
                                case "1":echo "--/--/----"; break;
                                case "2":echo date_format(date_create($row["rest_tran"]),"d/m/Y"); break;
    
                            }
                            ?>
                        </td>
                        <td class="text-center align-middle">
                            <?php 
                                switch($row['status_tran']){
                                    case "0":echo "<div class='btn btn-success rounded-pill '>คืนแล้ว</div>"; break;
                                    case "1":echo "<div class='btn btn-danger rounded-pill '>ยังไม่คืน</div>"; break;
                                    case "2":echo "<div class='btn btn-warning rounded-pill '>มีค่าปรับ</div>"; break;
        
                                }
                            ?>
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