<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php
        $sql = "SELECT * FROM fine";
        $result=mysqli_query($conn,$sql);
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

            <table class="table table-striped table-hover table-bordered table-responsive bg-white rounded shadow-sm ">
                <thead>
                    <tr>
                        <th scope="col" class="text-center align-middle" width="7.5%">#</th>
                        <th scope="col" class="text-center align-middle">จำนวนวันที่กำหนดให้ยืมหนังสือ</th>
                        <th scope="col" class="text-center align-middle" width="7.5%">-</th>
                        <th scope="col" class="text-center align-middle" width="7.5%">แก้ไข</th>

                    </tr>
                </thead>
                    
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo $row['id_fine'];?></td>
                        <td class="text-center align-middle"><?php echo $row["num_fine"];?></td>
                        <td class="text-center align-middle">บาท</td>
                        <td class="text-center align-middle">
                            <a href="../admin/dashboard.php?page=fine_edit&id_fine=<?php echo $row["id_fine"];?>"
                                class="btn btn-warning">
                                <i class="uil uil-edit fs-5"></i>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
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