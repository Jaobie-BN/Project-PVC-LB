<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/index_page.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <title>Library</title>
</head>

<body>

    <div class="login">

        <h1 class="text-center">Login</h1>
        <?php
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
        }
        ?>
        <form action="auth/check_login.php" method="POST" class="needs-validation">
            <div class="form-group ">
                <label class="form-label" for="username">ชื่อผู้ใช้</label>
                <input class="form-control" type="text" id="username" name="username" required>
                <div class='invalid-feedback'>
                    กรุณาป้อนชื่อผู้ใช้
                </div>
            </div>
            <div class="form-group ">
                <label class="form-label" for="password">รหัสผ่าน</label>
                <input class="form-control" type="password" id="password" name="password" required>
                <div class='invalid-feedback'>
                    กรุณาป้อนรหัสผ่าน
                </div>
            </div>

            <input class="btn btn-success w-100" type="submit" value="เข้าสู่ระบบ" name="btn_login">

        </form>


    </div>
</body>

<script src="assets/js/bootstrap.bundle.js"></script>

</html>