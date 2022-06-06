<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "koneksi.php";

    $idUSer = $_POST["user_mobile_id"];

    $query_tampil = "SELECT * FROM tikets WHERE user_mobile_id = '$idUSer'";
    $result_tiket = mysqli_query($koneksi, $query_tampil);
    $cek = mysqli_affected_rows($koneksi);

    $ambil = array();

    if ($cek > 0) {
        while ($baris = mysqli_fetch_assoc($result_tiket)) {
            $ambil[] = $baris;
        }
        $response["kode"]   = 1;
        $response["pesan"]  = "data tersedia";
        $response["data"] = $ambil;
    } else if ($cek == 0) {
        $response["kode"] = 0;
        $response["pesan"] = "data tidak tersedia";
    } else {
        $response["kode"] = -1;
        $response["pesan"] = "error";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
