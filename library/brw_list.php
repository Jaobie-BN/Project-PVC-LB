Book Holding.<br />
<table border="1">
    <tr>
        <td>Book ID</td>
        <td>Title</td>
        <td>Lend Date</td>
        <td>Deae Line</td>
        <td>Restore</td>
    </tr>
    <?php
        $sql="SELECT books.bid, books.btitle, transections.tlend, DATE_ADD(transections.tlend, INTERVAL 7 DAY) AS deadline FROM books, transections WHERE books.bid=transections.bid AND transections.mid='$mid' AND transections.tstat='1'";
        require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/connect.php";
        while($record=mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo($record[0]);?></td>
        <td><?php echo($record[1]);?></td>
        <td><?php echo date_format(date_create($record[2]),"d/m/Y");?></td>
        <td><?php echo date_format(date_create($record[3]),"d/m/Y");?></td>
        <td><a href="rst_save.php?mid=<?php echo($mid);?>&bid=<?php echo($record[0]);?>">Restore</a></td>
    </tr>
    <?php 
    }
    require $_SERVER['DOCUMENT_ROOT']."/user63202040097/library/mysql/unconn.php";
    ?>
</table>
