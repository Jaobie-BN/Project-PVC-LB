<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php
        if(isset($_GET['id_day'])){
            $id_day=$_GET['id_day'];
            $sql = "SELECT * FROM dayborr WHERE id_day='$id_day'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
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

            <?php
                        if(isset($_POST['edit'])){
                            $num_day = $_POST['num_day'];
                            if($num_day == ""){
                                header("Refresh:0; url=./dashboard.php?page=fine_edit&id_fine=$id_day");
                            } else {
                                $sql2 = "UPDATE dayborr set num_day = '$num_day' WHERE id_day = '$id_day'";
                                mysqli_query($conn,$sql2);
                                header("Refresh:0; url=./dashboard.php?page=date");
                            }
            
                        }
                    ?>
            <form action="" method="POST" class="needs-validation">
                <table class="table table-bordered table-responsive bg-white rounded shadow-sm ">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" class="fs-3">
                                <center>ฟอร์มแก้ไขข้อมูล</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="align-middle" width="30%">
                                <center>จำนวนวัน</center>
                            </th>
                            <td><input type="number" class="form-control" name="num_day"
                                    value="<?php echo $row['num_day']; ?>"></td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <center>
                                    <input type="submit" class="btn btn-warning w-25" name="edit" value="แก้ไข">
                                    <a href="?page=fine" class="btn btn-danger w-25">ยกเลิก</a>
                                </center>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </form>
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