<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/auth/auth_staff.php"; ?>

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
                        <img src="../assets/images/logo_pvc.png" alt="">
                    </div>
                    <span class="logo_name">บรรณารักษ์</span>
                </div>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="?page=home" class="list-group-item list-group-item-action bg-transparent second-text fw-bold 
                <?php 

                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case "home":echo "active"; break;
                    }
                } else {
                    header('location:?page=home');
                }

                ?>">
                    <i class="uil uil-estate me-2 fs-5"></i>
                    หน้าแรก
                </a>
                <a href="?page=books" class="list-group-item list-group-item-action bg-transparent second-text fw-bold 
                <?php 

                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case "books":echo "active"; break;
                        case "insert_books":echo "active"; break;
                        case "edit_books":echo "active"; break;
                        case "view_books":echo "active"; break;
                    }
                } else {
                    header('location:?page=home');
                }
            
                ?>">
                    <i class="uil uil-edit me-2 fs-5"></i>
                    ข้อมูลหนังสือ
                </a>
                <a href="?page=report_member" class="list-group-item list-group-item-action bg-transparent second-text fw-bold 
                <?php 

                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case "report_member":echo "active"; break;
                        case "insert_member":echo "active"; break;
                        case "edit_member":echo "active"; break;
                        case "view_member":echo "active"; break;
                        }
                    }   else {
                        header('location:?page=home');
                    }
                
                ?>">
                    <i class="uil uil-okta me-2 fs-5"></i>
                    ข้อมูลสมาชิก
                </a>
                <a href="?page=history" class="list-group-item list-group-item-action bg-transparent second-text fw-bold 
                <?php 

                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case "history":echo "active"; break;
                    }
                } else {
                    header('location:?page=home');
                }
            
                ?>">
                    <i class="uil uil-okta me-2 fs-5"></i>
                    ประวัติการยืม
                </a>

                <a href="?page=password_edit" class="list-group-item list-group-item-action bg-transparent second-text fw-bold 
                <?php 

                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case "password_edit":echo "active"; break;
                    }
                } else {
                    header('location:?page=home');
                }
            
                ?>">
                    <i class="uil uil-edit me-2 fs-5"></i>
                    เปลี่ยนรหัสผ่าน
                </a>
                <a href="?page=logout"
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
                    <h2 class="fs-2 m-0">
                        <?php 
                    if(isset($_GET['page'])){
                        switch($_GET['page']){
                            case "home":echo "รายงาน"; break;
                            case "books":echo "ข้อมูลหนังสือ"; break;
                            case "insert_books":echo "เพิ่มข้อมูลหนังสือ"; break;
                            case "edit_books":echo "แก้ไขข้อมูลหนังสือ"; break;
                            case "view_books":echo "ข้อมูลหนังสือ"; break;
                            case "report_member":echo "ข้อมูลสมาชิก"; break;
                            case "insert_member":echo "เพิ่มข้อมูลสมาชิก"; break;
                            case "edit_member":echo "แก้ไขข้อมูลสมาชิก"; break;
                            case "view_member":echo "การทำรายการยืม-คืนหนังสือ"; break;
                            case "history":echo "ประวัติการยืม"; break;
                            case "password_edit":echo "เปลี่ยนรหัสผ่าน"; break;
                            
                            

                        }
                    } else {
                        header('location:?page=home');
                    } 
                    
                    
                    ?>
                    </h2>
                </div>



            </nav>

            <div class="container-fluid px-4">

                <?php 

                    if(isset($_GET['page'])){
                        switch($_GET['page']){
                            case "home":include("page/home.php"); break;
                            case "books":include("page/books.php"); break;
                            case "insert_books":include("page/insert_books.php"); break;
                            case "report_member":include("page/report_member.php"); break;
                            case "insert_member":include("page/insert_member.php"); break;
                            case "history":include("page/history.php"); break;
                            case "password_edit":include("page/password_edit.php"); break;
                            case "edit_books":include("page/edit_books.php"); break;
                            case "edit_member":include("page/edit_member.php"); break;
                            case "view_member":include("page/view_member.php"); break;
                            case "view_books":include("page/view_books.php"); break;
                            case "logout":echo "
                            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                            Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'คุณต้องการออกระบบหรือไม่',
                            showCancelButton: true,
                            confirmButtonColor: '#dc3545',
                            cancelButtonColor: '#adb5bd',
                            confirmButtonText: 'ออกจากระบบ',
                            cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            window.location.href ='../auth/logout.php'
                            }else{
                            window.location.href ='?page=home'
                        }
                    })
                    </script>";
                    break;
                        }
                    } else {
                        header('location:?page=home');
                    }
                
                ?>

            </div>

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