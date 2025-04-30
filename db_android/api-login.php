<?php

include 'koneksi.php';

$username   = $_GET['username'];
$password   = $_GET['password'];

$queryRegister  = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

$msql   = mysqli_query($koneksi, $queryRegister);
$result = mysqli_num_rows($msql);

if (!empty($username)&& !empty($password)){
    if ($result == 0) {
        echo "0";
    }else{
        echo "Selamat Datang";
    }
}else{
    echo "Ada Data yang masih kosong!";
}