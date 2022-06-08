<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "koneksi.php";

    $idUser = $_POST['user_mobile_id'];
    // $namaUser = $_POST['nama_user'];
    $idWisata = $_POST['wisata_id'];
    $kodeTransaksi = $_POST['kode_transaksi'];
    // $namaWisata = $_POST['nama_wisata'];
    $tglTiket = $_POST['tgl_tiket'];
    $jumlahTiket = $_POST['jumlah_tiket'];
    $totalHarga = $_POST['total_harga'];
    $createdAt = $_POST['created_at'];


    $response = array();


    $query_tambah_transaksi = "INSERT INTO transaksis VALUES
        ('', '$idUser', '$idWisata',$kodeTransaksi, '$tglTiket', '$jumlahTiket', '$totalHarga','$createdAt','')";

    $result = mysqli_query($koneksi, $query_tambah_transaksi);
    $cek = mysqli_affected_rows($koneksi);

    if ($cek > 0) {
        $response["kode"] = 201;
        $response["pesan"] = "Sukses";
        $response["kode_transaksi"] = $kodeTransaksi;
    } else {
        $response["kode"] = -1;
        $response["pesan"] = "Gagal";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
