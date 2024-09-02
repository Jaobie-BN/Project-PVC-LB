<?php require $_SERVER['DOCUMENT_ROOT']."/library_pvc/src/Database/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/dashboard.css">

    <title>Library</title>
</head>

<body>

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="assets/images/logo_pvc.png" alt="">
            </div>

            <span class="logo_name">Dashboard</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">หน้าแรก</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-edit"></i>
                        <span class="link-name">จัดการบุคลากร</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-users-alt"></i>
                        <span class="link-name">จัดการข้อมูลสมาชิก</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-analysis"></i>
                        <span class="link-name">จัดการสถานะ</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">จำนวนวันที่ยืม</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="auth/logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">ออกจากระบบ</span>
                    </a></li>

                <li class="mode">
                    <a href="">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</body>
<!-- Custom JS -->
<script src="assets/js/dashboard.js"></script>

</html>