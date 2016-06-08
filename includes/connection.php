<?php
$conn_error = 'could not connect';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'new';
$conn=mysqli_connect($db_host,$db_user,$db_pass) or die($conn_error);
mysqli_select_db($conn,'new') or die($conn_error);
?>