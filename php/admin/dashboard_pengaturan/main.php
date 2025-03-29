<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validasi Password
    if ($new_password && $new_password !== $confirm_password) {
        $error_message = "Password dan konfirmasi password tidak cocok.";
        header("Location: dashboard_pengaturan.php?error=" . urlencode($error_message));
        exit();
    }

    // Siapkan query update
    $update_fields = [];
    $params = [];
    $sql = "UPDATE users SET ";

    if (!empty($name)) {
        $update_fields[] = "name = ?";
        $params[] = $name;
    }

    if (!empty($email)) {
        $update_fields[] = "email = ?";
        $params[] = $email;
    }

    // Hash Password
    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_fields[] = "password = ?";
        $params[] = $hashed_password;
    }

    // Validasi ketika tidak ada data yang diubah
    if (count($update_fields) == 0) {
        $error_message = "Tidak ada data yang diubah.";
        header("Location: dashboard_pengaturan.php?error=" . urlencode($error_message));
        exit();
    }

    $sql .= implode(", ", $update_fields) . " WHERE user_id = ?";
    $params[] = $user_id;

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(str_repeat("s", count($params) - 1) . "i", ...$params);

        try {
            $stmt->execute();
            // Update session
            $stmt = $conn->prepare("SELECT name, email FROM users WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
            }
            // Validasi ketika data berhasil diupdate
            $success_message = "Data berhasil diperbarui.";
            header("Location: dashboard_pengaturan.php?success=" . urlencode($success_message));
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) { // Error code 1062: Duplicate entry
                $error_message = "Email sudah digunakan, silakan coba email lain.";
                header("Location: dashboard_pengaturan.php?error=" . urlencode($error_message));
            } else {
                $error_message = "Terjadi kesalahan, coba lagi.";
                header("Location: dashboard_pengaturan.php?error=" . urlencode($error_message));
            }
        }
    } else {
        $error_message = "Gagal mempersiapkan statement.";
        header("Location: dashboard_pengaturan.php?error=" . urlencode($error_message));
    }

    $stmt->close();
    $conn->close();
}
?>
