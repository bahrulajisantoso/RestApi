<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "koneksi.php";

    $idUser = $_POST['user_mobile_id'];
    $namaUser = $_POST['nama_user'];
    $idWisata = $_POST['wisata_id'];
    $namaWisata = $_POST['nama_wisata'];
    $tglTiket = $_POST['tgl_tiket'];
    $jumlahTiket = $_POST['jumlah_tiket'];
    $totalHarga = $_POST['total_harga'];


    $response = array();


    $query_tambah_transaksi = "INSERT INTO transaksis VALUES
        ('', '$idUser', '$namaUser', '$idWisata', '$namaWisata', '$tglTiket', '$jumlahTiket', '$totalHarga','','')";

    $result = mysqli_query($koneksi, $query_tambah_transaksi);
    $cek = mysqli_affected_rows($koneksi);

    if ($cek > 0) {
        $response["kode"] = 201;
        $response["pesan"] = "Sukses";
    } else {
        $response["kode"] = -1;
        $response["pesan"] = "Gagal";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
