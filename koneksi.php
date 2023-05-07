<?php
$host = 'localhost';
$db = 'imcreative';
$user = 'root';
$pass = '';
$koneksi =  mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
?>