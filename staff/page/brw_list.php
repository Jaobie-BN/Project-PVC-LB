<?php
$sql="SELECT * FROM dayborr";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
$result=mysqli_query($conn,$sql);
$record=mysqli_fetch_array($result);
$dayborr=(int)$record[1];
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/unconn.php";
require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
?>
<div class="text-center fs-3 m-md-1">
    ตารางการยืม - คืน
</div>
<table class="table table-striped table-bordered table-responsive bg-white rounded shadow-sm ">
    <tr>
        <th scope="col" width="15%" class="text-center align-middle">เลขทะเบียนหนังสือ</th>
        <th scope="col" class="text-center align-middle">ชื่อหนังสือ</th>
        <th scope="col" class="text-center align-middle">วันที่ยืม</th>
        <th scope="col" class="text-center align-middle">วันที่ต้องคืน</th>
        <th scope="col" width="10%" class="text-center align-middle">คืนหนังสือ</th>
    </tr>
    <?php
        $sql2="SELECT books.id_bk, books.name_bk, transection.lend_tran, DATE_ADD(transection.lend_tran, INTERVAL $dayborr DAY) AS deadline 
        FROM books, transection 
        WHERE books.id_bk=transection.id_bk AND transection.id_mem='$id_mem' AND transection.status_tran='1'";
        $result2=mysqli_query($conn,$sql2);
        while($record2=mysqli_fetch_array($result2)){
    ?>
    <tr>
        <td class="align-middle text-center"><?php echo($record2[0]);?></td>
        <td class="align-middle"><?php echo($record2[1]);?></td>
        <td class="align-middle text-center"><?php echo date_format(date_create($record2[2]),"d/m/Y");?></td>
        <td class="align-middle text-center"><?php echo date_format(date_create($record2[3]),"d/m/Y");?></td>
        <td class="align-middle text-center"><a class="btn btn-outline-success" href="rst_save.php?id_mem=<?php echo($id_mem);?>&id_bk=<?php echo($record2[0]);?>">
                <i class="uil uil-redo fs-5"></i>
            </a>
        </td>
    </tr>
    
    <?php 
    }
    ?>
</table>