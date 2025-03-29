<?php

// Memulai Sesi
session_start();

// Pengecekan users sudah login, jika sudah maka kemabalikan ke halaman sesuai role
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ../admin/dashboard_beranda.php");
    } elseif ($_SESSION['role'] == 'pengguna') {
        header("Location: ../pages/dashboard_beranda.php");
    }
    exit();
}

?>