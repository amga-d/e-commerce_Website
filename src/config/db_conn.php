<?php

$db_host = "localhost";
$db_name = "ecommerce";
$db_user = "root";
$db_password = "";

$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

function getDbConn() {
    global $conn;
    return $conn;
}
?>