<?php

session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Mencegah pengguna masuk ke halaman pengguna
if ($_SESSION['role'] !== 'pengguna') {
    header("Location: ../admin/dashboard_beranda.php");
    exit();
}

// Membuat Sesi
$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];

?>