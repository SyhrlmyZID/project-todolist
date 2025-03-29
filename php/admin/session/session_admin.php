<?php

session_start();

// Pengecekan user sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Mencegah pengguna masuk ke halaman admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../pages/dashboard_beranda.php");
    exit();
}

// Membuat Sesi untuk menampilkan data id pengguna, nama, email, dan role
$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];

?>