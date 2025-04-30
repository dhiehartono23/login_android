<?php
header("Content-Type: application/json; charset=UTF-8");

// Pastikan tidak ada output tambahan
ob_clean();
require 'koneksi.php';

$response = [];

if (isset($_POST['nama'], $_POST['username'], $_POST['password'], $_POST['npm'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $npm = $_POST['npm'];

    if ($nama == "" || $username == "" || $password == "" || $npm == "") {
        $response = [
            "success" => false,
            "message" => "Semua field wajib diisi"
        ];
    } else {
        $cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
        if (mysqli_num_rows($cek) > 0) {
            $response = [
                "success" => false,
                "message" => "Username sudah digunakan"
            ];
        } else {
            $insert = mysqli_query($conn, "INSERT INTO user (nama, username, password, npm) VALUES ('$nama','$username','$password','$npm')");
            $response = $insert ?
                ["success" => true, "message" => "Registrasi berhasil"] :
                ["success" => false, "message" => "Gagal registrasi"];
        }
    }
} else {
    $response = [
        "success" => false,
        "message" => "Parameter tidak lengkap"
    ];
}

// Kirim hanya JSON, tanpa karakter lain
echo json_encode($response);
exit();