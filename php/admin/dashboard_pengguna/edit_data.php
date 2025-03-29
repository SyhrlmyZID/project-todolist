<?php

// Tidak ada data yang dipilih kembalikan ke halaman dashboard_pengguna.php
$user_id = $_GET['user_id'] ?? null;
if (!$user_id) {
    header('Location: dashboard_pengguna.php');
    exit();
}

$query = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "Pengguna tidak ditemukan.";
    exit();
}

$message = "";
$messageType = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?: $user['name'];
    $email = $_POST['email'] ?: $user['email'];
    $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];
    $role = $_POST['role'] ?: $user['role'];

    // Query update data ke database
    $updateQuery = "UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE user_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ssssi", $name, $email, $password, $role, $user_id);

    if ($updateStmt->execute()) {
        // Validasi ketika data berhasil di update
        $message = "Data berhasil diperbarui!";
        $messageType = "success";
         // Update session
        if ($user_id == $_SESSION['user_id']) {
            $_SESSION['name'] = $name;
        }
    } else {
        // Validasi ketika terjadi error
        $message = "Terjadi kesalahan saat memperbarui data.";
        $messageType = "error";
    }

    // Refresh data setelah selesai update
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

?>