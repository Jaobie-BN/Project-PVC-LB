<form action="lnd_save.php" method="post">
    <div class="row">
        <div class="input-group">
            <input type="hidden" name="id_mem" value="<?php echo($id_mem);?>">
            <input class="form-control" placeholder="กรอกรหัสทะเบียนหนังสือต้องการยืม" type="text" name="id_bk">
            <input class="btn btn-outline-primary w-25" type="submit" name="submit" value="ค้นหา">
        </div>
    </div>
</form>