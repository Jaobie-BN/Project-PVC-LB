<?php
    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
    $sql="SELECT COUNT(*) FROM member WHERE level_mem = 'member'";
    $result=mysqli_query($conn,$sql);
    $record=mysqli_fetch_array($result);
    $num_mem=$record[0];
    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";

    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
    $sql="SELECT COUNT(*) FROM books";
    $result=mysqli_query($conn,$sql);
    $record=mysqli_fetch_array($result);
    $num_bk=$record[0];
    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";
    
    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
    $sql="SELECT COUNT(*) FROM transection";
    $result=mysqli_query($conn,$sql);
    $record=mysqli_fetch_array($result);
    $num_t=$record[0];
    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";

    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
    $sql="SELECT COUNT(*) FROM transection WHERE status_tran='2'";
    $result=mysqli_query($conn,$sql);
    $record=mysqli_fetch_array($result);
    $num_f=$record[0];
    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.8/countUp.umd.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">

    <title>Library</title>
</head>

<body>


    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white text-bg-primary mb-3 h-100">
                <div class="card-header">
                    <i class="uil uil-book-alt fs-3"></i>
                    หนังสือ
                </div>
                <div class="card-body">
                    <div class="card-title mb-0 my-3 fs-1 text-center align-middle">
                        <b id="c1" class="s-counter" data-value="<?php echo $num_bk?>"><?php echo $num_bk?></b> รายการ
                    </div>
                </div>
                <a href="" class="card-footer btn btn-close-white">
                    เพิ่มเติม
                    <i class="uil uil-arrow-circle-right fs-4"></i>

                </a>


            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white text-bg-info mb-3 h-100">
                <div class="card-header">
                    <i class="uil uil-users-alt fs-3"></i>
                    สมาชิก
                </div>
                <div class="card-body">
                    <div class="card-title mb-0 my-3 fs-1 text-center align-middle">
                        <b id="c2" class="s-counter" data-value="<?php echo $num_mem?>"><?php echo $num_mem;?></b>
                        รายการ
                    </div>
                </div>
                <a href="" class="card-footer btn btn-close-white">
                    เพิ่มเติม
                    <i class="uil uil-arrow-circle-right fs-4"></i>

                </a>

                </a>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white text-bg-success mb-3 h-100">
                <div class="card-header">
                    <i class="uil uil-list-ul fs-3"></i>
                    รายการยืม
                </div>
                <div class="card-body">
                    <div class="card-title mb-0 my-3 fs-1 text-center align-middle">
                        <b id="c3" class="s-counter" data-value="<?php echo $num_t?>"><?php echo $num_t;?></b> รายการ
                    </div>
                </div>
                <a href="" class="card-footer btn btn-close-white">
                    เพิ่มเติม
                    <i class="uil uil-arrow-circle-right fs-4"></i>

                </a>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white text-bg-danger mb-3 h-100">
                <div class="card-header">
                    <i class="uil uil-bill fs-3"></i>
                    ค้างชำระค่าปรับ
                </div>
                <div class="card-body">
                    <div class="card-title mb-0 my-3 fs-1 text-center align-middle">
                        <b id="c4" class="s-counter" data-value="<?php echo $num_f?>"><?php echo $num_f;?></b> คน
                    </div>
                </div>
                <a href="" class="card-footer btn btn-close-white">
                    เพิ่มเติม
                    <i class="uil uil-arrow-circle-right fs-4"></i>

                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 mb-3">
            <table class="table table-light table-striped table-bordered">
                <tr class="table-primary">
                    <th class="text-center">No.</th>
                    <th class="text-center">ชื่อหนังสือ</th>
                    <th class="text-center">จำนวนการยืม</th>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">ชื่อหนังสือ</td>
                    <td class="text-center">จำนวนการยืม</td>
                </tr>
            </table>
        </div>

    </div>



</body>
<!-- Custom JS -->

<script src="../../assets/js/bootstrap.bundle.js"></script>
<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};
</script>
<script>
let done = [];

function isComing(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight)
    );
}

function s_counters() {
    const s_counters = document.querySelectorAll(".s-counter");
    s_counters.forEach(function(cntr) {
        if (isComing(cntr)) {
            var cntr_id = cntr.id;
            if (!done[cntr_id]) {
                var cntr_val = cntr.dataset.value;
                var cntr_run = new countUp.CountUp(cntr_id, cntr_val);
                cntr_run.start();
                done[cntr_id] = true;
            }
        }
    });
}
document.addEventListener("DOMContentLoaded", s_counters);

window.addEventListener("scroll", s_counters, {
    passive: true
});
</script>

</html>