<?php

// Inisialisasi variabel pesan dan status sukses
$message = '';
$success = false;

// Pengecekan method request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validasi jika semua kolumn pada kosong
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        $message = "Semua kolom tidak boleh kosong.";
    } else {
        // Cek apakah email sudah terdaftar di database
        $checkQuery = "SELECT email FROM users WHERE email = '$email'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            // Jika email sudah ada, tampilkan pesan error
            $message = "Email sudah terdaftar. Gunakan email lain.";
        } else {
            // Mengenkripsi password sebelum disimpan ke database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Query untuk menambahkan pengguna
            $insertQuery = "INSERT INTO users (name, email, password, role, created_at) 
                            VALUES ('$name', '$email', '$hashedPassword', '$role', NOW())";

            // Eksekusi query dan pengecekan berhasil
            if ($conn->query($insertQuery)) {
                $message = "Pengguna berhasil ditambahkan.";
                $success = true;
            } else {
                $message = "Terjadi kesalahan. Silakan coba lagi.";
            }
        }
    }
}

?>
