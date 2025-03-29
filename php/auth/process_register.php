<?php

// Koneksi Database
include '../config/connection.php';

// Memeriksa apakah request method "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Mengambil data dari form input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = 'pengguna'; // Role default

    // Pengecekan apakah panjang password kurang dari 5 karakter
    if (strlen($password) < 5) {
        echo json_encode(["status" => "error", "message" => "Password minimal 5 karakter."]);
        exit();
    }

    // Enskripsi password hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $check_email = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($check_email->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email sudah terdaftar."]);
        exit();
    }

    // Query sql menyimpan data ke database
    $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$role')";
    
    // Pengecekan data
    if ($conn->query($query) === TRUE) {
        // Jika nilai nya benar maka tampilkan pesan berhasil
        echo json_encode(["status" => "success", "message" => "Registrasi berhasil!"]);
    } else {
        // Jika nilai nya selain true maka tampilkan pesan error
        echo json_encode(["status" => "error", "message" => "Registrasi gagal."]);
    }

    // Menutup koneksi
    $conn->close();
    exit();

}

?>
