<?php @session_start();
date_default_timezone_set('Asia/Dubai');

$conn = mysqli_connect("localhost", "root", "", "migrationpro");
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    echo "Database doesn't connect!";
    exit;
}

$siteurl = "https://localhost/mykuryer/";
$siteurladmin = "https://localhost/mykuryer/admin";
?>