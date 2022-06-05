<?php
include 'koneksi.php';
$id = $_POST['id'];

$query = "SELECT * FROM wisatas WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
   $response['gambar_1'] = $data['gambar_1'];
   $response['gambar_2'] = $data['gambar_2'];
   $response['gambar_3'] = $data['gambar_3'];
}
echo json_encode($response);
