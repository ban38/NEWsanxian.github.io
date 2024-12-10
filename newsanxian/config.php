<?php

// 資料庫設定
$dbhost = "localhost";
$dbuser = "Sanxian@4321";
$dbpass = "Sanxian@4321";
$dbname = "taiyi";

// 建立資料庫連線
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// 檢查連線是否成功
if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}

?>
