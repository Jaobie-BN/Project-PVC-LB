<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/auth/auth.php"; ?>
<?php
    $sql = "SELECT * FROM member";
    $query = mysqli_query($conn, $sql);
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

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <div class="logo-name">
                    <div class="logo-image">
                        <img src="assets/images/logo_pvc.png" alt="">
                    </div>
                    <span class="logo_name">บรรณารักษ์</span>
                </div>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                    <i class="uil uil-estate me-2 fs-5"></i>
                    หน้าแรก
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="uil uil-edit me-2 fs-5"></i>
                    หมวดหมู่
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="uil uil-edit me-2 fs-5"></i>
                    ที่เก็บหนังสือ
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="uil uil-edit me-2 fs-5"></i>
                    หนังสือ/Barcode
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="uil uil-okta me-2 fs-5"></i>
                    ข้อมูลสมาชิก
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="uil uil-okta me-2 fs-5"></i>
                    ดูประวัติทั้งหมด
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="uil uil-edit me-2 fs-5"></i>
                    แก้ไขโปรไฟล์
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="uil uil-edit me-2 fs-5"></i>
                    เปลี่ยนรหัสผ่าน
                </a>
                <a href="/library_pvc/auth/logout.php"
                    class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="uil uil-sign-out-alt me-2 fs-5"></i>
                    ออกจากระบบ
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="uil uil-bars primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>



            </nav>


        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
</body>
<!-- Custom JS -->
<script src="../assets/js/bootstrap.bundle.js"></script>
<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};
</script>

</html>