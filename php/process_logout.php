<?php
session_start();

// Hapus semua session
session_unset(); // Menghapus semua data session

// Hancurkan session
session_destroy(); // Menghancurkan session

// Hapus cookies yang terkait
setcookie("user_id", "", time() - 3600, "/");
setcookie("name", "", time() - 3600, "/");
setcookie("email", "", time() - 3600, "/");
setcookie("role", "", time() - 3600, "/");

// Redirect ke halaman login
header("Location: ../auth/login.php");
exit();
?>
