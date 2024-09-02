<?php require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/config.php";?>
<?php 
$mid=$_GET['mid'];
require("mbr_select.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td colspan="2">Member Detail.</td>
        </tr>
        <tr>
            <td align="rigth">ID :</td>
            <td align="left"><?php echo($mid);?></td>
        </tr>
        <tr>
            <td align="rigth">Name :</td>
            <td align="left"><?php echo($mname);?></td>
        </tr>
        <tr>
            <td align="rigth">Department</td>
            <td align="left"><?php echo($mdep);?></td>
        </tr>
        <tr>
            <td colspan="2" align="rigth"><a href="mbr_list.php">Beck</a></td>
        </tr>
    </table>
    <br>
    <?php require("brw_form.php");?><br />
    <?php require("brw_list.php");?><br />
    <?php require("fne_list.php");?><br />
</body>
</html>