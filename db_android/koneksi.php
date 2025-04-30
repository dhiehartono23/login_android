<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$dbName   = "db_android";

$koneksi = mysqli_connect($hostName, $userName, $password, $dbName);

if (!$koneksi) {
    echo "Koneksi Gagal: " . mysqli_connect_error();
}