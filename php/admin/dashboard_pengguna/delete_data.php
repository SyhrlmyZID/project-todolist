<?php

// Tidak ada data yang dipilih kembalikan ke halaman dashboard_pengguna.php
$user_id = $_GET['user_id'] ?? null;
if (!$user_id) {
    header('Location: dashboard_pengguna.php');
    exit();
}

$message = "";

// Proses hapus data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user_id == $_SESSION['user_id']) {
        // Validasi ketika akun sedang digunakan
        $message = "Tidak dapat menghapus akun ini karena sedang digunakan.";
    } else {
        $deleteQuery = "DELETE FROM users WHERE user_id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $user_id);

        if ($deleteStmt->execute()) {
            // Validasi ketika berhasil menghapus data
            $message = "Akun dan semua tugas terkait berhasil dihapus.";
            header('Location: dashboard_pengguna.php');
            exit();
        } else {
            // Validasi ketika terjadi error
            $message = "Terjadi kesalahan saat menghapus data.";
        }
    }
}

?>