<?php

// Koneksi Database
include '../config/connection.php';

// Mengambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Mengambil data pengguna (nama & email)
$sql_user = "SELECT name, email FROM users WHERE user_id = $user_id";
$result_user = $conn->query($sql_user);
$user = $result_user->fetch_assoc();

// Menghitung total tugas (selesai & tertunda)
$sql_stats = "SELECT 
    (SELECT COUNT(*) FROM tasks WHERE user_id = $user_id) AS total_tasks,
    (SELECT COUNT(*) FROM tasks WHERE user_id = $user_id AND status = 'selesai') AS completed_tasks,
    (SELECT COUNT(*) FROM tasks WHERE user_id = $user_id AND status = 'tertunda') AS pending_tasks";

$result_stats = $conn->query($sql_stats);
$stats = $result_stats->fetch_assoc();

// Mengambil 3 tugas terbaru
$sql_tasks = "SELECT task_name, deadline, status FROM tasks WHERE user_id = $user_id ORDER BY updated_at DESC LIMIT 3";
$result_tasks = $conn->query($sql_tasks);
$tasks = $result_tasks->fetch_all(MYSQLI_ASSOC);

?>
