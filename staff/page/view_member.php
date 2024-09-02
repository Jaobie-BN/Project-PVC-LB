<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php"; ?>

<?php 
error_reporting(E_ERROR | E_PARSE);
$id_mem=$_GET['id_mem'];
require("mbr_select.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>
<body>
    <table class="table table-bordered table-responsive bg-white rounded shadow-sm">
        <tr>
            <th class="text-center fs-5" colspan="2">ข้อมูลสมาชิก</th>
        </tr>
        <tr>
            <td class=" col-6 text-end">ID :</td>
            <td class=" col-6text-start"><?php echo($id_mem);?></td>
        </tr>
        <tr>
            <td class="text-end">Name :</td>
            <td class="text-start"><?php echo($name_mem);?></td>
        </tr>
        <tr>
            <td class="text-end">Department :</td>
            <td class="text-start"><?php echo($dep_mem);?></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center"><a class="btn btn-secondary" href="dashboard.php?page=report_member">ยกเลิก</a></td>
        </tr>
    </table>
    <br>
    <?php require("brw_form.php");?><br />
    <?php require("brw_list.php");?><br />
    <?php require("fne_list.php");?><br />
</body>
</html>