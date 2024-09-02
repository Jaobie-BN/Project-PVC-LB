<?php

$host = "localhost";
$user = "u63202040097";
$password = "p63202040097";
$dbName = "db63202040097";

$conn = mysqli_connect($host,$user,$password,$dbName) or die (mysqli_error($conn));

mysqli_set_charset($conn, "utf8");

?>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js'></script>
<script src='https://code.jquery.com/jquery-3.6.3.min.js'></script>