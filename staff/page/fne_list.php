<?php 
$sql="SELECT * FROM fine";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
$result=mysqli_query($conn,$sql);
$record=mysqli_fetch_array($result);
$fine=(int)$record[1];
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";

$sql="SELECT * FROM dayborr";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
$result=mysqli_query($conn,$sql);
$record=mysqli_fetch_array($result);
$dayborr=(int)$record[1];
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";
?>
<div class="text-center fs-3 m-md-1">
    ตารางค่าปรับ
</div>
<table class="table table-striped table-bordered table-responsive bg-white rounded shadow-sm ">
    <tr>
        <th scope="col" width="15%" class="text-center align-middle">เลขทะเบียนหนังสือ</th>
        <th scope="col" class="text-center align-middle">ชื่อหนังสือ</th>
        <th scope="col" class="text-center align-middle">วันที่ยืม</th>
        <th scope="col" class="text-center align-middle">วันที่ต้องคืน</th>
        <th scope="col" class="text-center align-middle">วันที่คืน</th>
        <th scope="col" class="text-center align-middle">วันที่เกิน</th>
        <th scope="col" class="text-center align-middle">ค่าปรับ</th>
        <th scope="col" class="text-center align-middle">ชำระ</th>
    </tr>
    <?php
        require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
        $sql3="SELECT books.id_bk, books.name_bk, transection.lend_tran, DATE_ADD(transection.lend_tran, INTERVAL $dayborr DAY) AS deadline,
        transection.rest_tran, DATEDIFF(transection.rest_tran,transection.lend_tran)-$dayborr AS late FROM books, transection
        WHERE books.id_bk=transection.id_bk AND transection.id_mem='$id_mem' AND transection.status_tran='2'";
        $result3=mysqli_query($conn,$sql3);
        while($record3=mysqli_fetch_array($result3)){
    ?>
    <tr>
        <td class="align-middle text-center"><?php echo($record3[0]);?></td>
        <td class="align-middle"><?php echo($record3[1]);?></td>
        <td class="align-middle text-center"><?php echo date_format(date_create($record3[2]),"d/m/Y");?></td>
        <td class="align-middle text-center"><?php echo date_format(date_create($record3[3]),"d/m/Y");?></td>
        <td class="align-middle text-center"><?php echo date_format(date_create($record3[4]),"d/m/Y");?></td>
        <td class="align-middle text-center"><?php echo((int)$record3[5]);?> วัน</td>
        <td class="align-middle text-center"><?php echo((int)$record3[5]*$fine);?> บาท</td>
        <td class="align-middle text-center">
            <a class="btn btn-success" href="fne_keep.php?id_mem=<?php echo($id_mem);?>&id_bk=<?php echo($record3[0]);?>&lend_tran=<?php echo($record3[2]);?>">
                <i class="uil uil-bill fs-5"></i>
            </a>
        </td>
    </tr>
    <?php 
    }
    ?>
</table>