<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "koneksi.php";

    $id_user = $_POST["id"];
    $nama_user = $_POST["nama"];
    // $jenis_kelamin = $_POST["jenis_kelamin"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $no_hp = $_POST["no_hp"];
    $email = $_POST["email"];

    $response = array();

    $query = "UPDATE user_mobiles SET 
        nama = '$nama_user',
        tgl_lahir = '$tgl_lahir',
        no_hp = '$no_hp',
        email = '$email'
            WHERE
        id = '$id_user'";

    $result_update_user = mysqli_query($koneksi, $query);
    $cek = mysqli_affected_rows($koneksi);

    if ($cek > 0) {

        $response["kode"] = 1;
        $response["pesan"] = "Edit data berhasil silahkan login kembali";
    } else if ($cek == 0) {

        $response["kode"] = 0;
        $response["pesan"] = "Anda tidak melakukan perubahan";
    } else {

        $response["kode"] = -1;
        $response["pesan"] = "Edit data gagal";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
