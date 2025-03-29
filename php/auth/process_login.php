<?php

// Koneksi Database
include '../config/connection.php';

// Memeriksa request method "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Mengambil data dari from login
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query mengambil data pengguna dari tabel "users"
    $query = "SELECT user_id, name, email, password, role FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    // Memerika apakah users di temukan
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Memverifikasi Password Hash
        if (password_verify($password, $user['password'])) {

            // Menyimpan session ini untuk digunakan di halaman selanjutnya
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Redirect berdasarkan role
            if ($user['role'] === "admin") {
                echo json_encode(["status" => "success", "redirect" => "../admin/dashboard_beranda.php"]);
            } else if ($user['role'] === "pengguna") {
                echo json_encode(["status" => "success", "redirect" => "../pages/dashboard_beranda.php"]);
            }
            exit();
            
        } else {

            // Jika password nya salah maka tampilkan pesan error
            echo json_encode(["status" => "error", "message" => "Password anda salah!"]);
            exit();
        }

    // Jika users tidak di temukan maka tampilkan pesan error
    } else {
        echo json_encode(["status" => "error", "message" => "Email belum terdaftar!"]);
        exit();
    }
}
?>
