<?php

require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_email = "SELECT * FROM user_mobiles WHERE email = '$email'";
    $result_email = mysqli_query($koneksi, $query_email);

    $cek_email = mysqli_num_rows($result_email);

    if ($cek_email > 0) {

        $baris = mysqli_fetch_assoc($result_email);

        if (password_verify($password, $baris["password"])) {

            $response["kode"] = 200;
            $response["pesan"] = "Login berhasil";
            $response["id"] = $baris["id"];
        } else {

            $response["kode"] = 403;
            $response["pesan"] = "Password anda salah";
        }
    } else {

        $response["kode"] = 404;
        $response["pesan"] = "User tidak ditemukan";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
