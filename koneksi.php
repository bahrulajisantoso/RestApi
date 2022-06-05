<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "arah_kita";

$koneksi = mysqli_connect($host, $user, $pass, $db)
    or die("database mysql tidak terhubung");
