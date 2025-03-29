<?php

// Pencarian data
$search = isset($_GET['search']) ? $_GET['search'] : '';
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

if (!empty($search)) {
    // Query pencarian tanpa pagination (tampilkan semua hasil)
    $query = "SELECT task_id, task_name, deadline, priority, status FROM tasks 
              WHERE user_id = ? AND task_name LIKE ? ORDER BY created_at DESC";
    $stmt = $conn->prepare($query);
    $likeSearch = "%{$search}%";
    $stmt->bind_param("is", $user_id, $likeSearch);

    // Hitung total data untuk menampilkan jumlah hasil pencarian
    $total_query = "SELECT COUNT(*) as total FROM tasks WHERE user_id = ? AND task_name LIKE ?";
    $total_stmt = $conn->prepare($total_query);
    $total_stmt->bind_param("is", $user_id, $likeSearch);
    $total_stmt->execute();
    $total_result = $total_stmt->get_result();
    $total_tasks = $total_result->fetch_assoc()['total'];
    $total_pages = 1; // Hanya satu halaman karena semua data ditampilkan
} else {
    // Query tanpa pencarian dengan pagination
    $query = "SELECT task_id, task_name, deadline, priority, status FROM tasks 
              WHERE user_id = ? LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $user_id, $limit, $offset);

    // Hitung total data tanpa pencarian
    $total_query = "SELECT COUNT(*) as total FROM tasks WHERE user_id = ?";
    $total_stmt = $conn->prepare($total_query);
    $total_stmt->bind_param("i", $user_id);
    $total_stmt->execute();
    $total_result = $total_stmt->get_result();
    $total_tasks = $total_result->fetch_assoc()['total'];
    $total_pages = ceil($total_tasks / $limit);
}

$stmt->execute();
$result = $stmt->get_result();
$tasks = $result->fetch_all(MYSQLI_ASSOC);



// Proses membuat tugas tugas
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_name'])) {
    // Ambil data dari form
    $task_name = $_POST['task_name'];
    $deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : "Tidak ada tanggal pasti";
    $priority = $_POST['priority'];

    // Pengecekan data valid
    if (!empty($task_name) && !empty($priority)) {
        // Query membuat tugas dengann status tertunda
        $stmt = $conn->prepare("INSERT INTO tasks (user_id, task_name, deadline, priority, status) VALUES (?, ?, ?, ?, 'Tertunda')");
        $stmt->bind_param("isss", $user_id, $task_name, $deadline, $priority);

        if ($stmt->execute()) {
            // Validasi ketika berhasil membuat tugas
            $success_message = "Berhasil membuat Tugas.";
            header("Location: ../../../pages/dashboard_buat_tugas.php?success=" . urlencode($success_message));
            exit();
        } else {
            // Validasi ketika terjadi error
            $error_message = "Gagal membuat Tugas.";
            header("Location: ../../../pages/dashboard_buat_tugas.php?error=" . urlencode($error_message));
            exit();
        }        
    }
}



// Proses hapus tugas
// Cek apakah ada ID yang dikirim via GET
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    // Query menghapus tugas berdasarkan task_id
    $sql = "DELETE FROM tasks WHERE task_id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $taskId);
        
        if ($stmt->execute()) {
            // Redirect dengan parameter success
            header("Location: dashboard_buat_tugas.php?success=Tugas berhasil dihapus");
            exit();
        } else {
            header("Location: pages/dashboard_buat_tugas.php?error=Gagal menghapus tugas");
            exit();
        }
    } else {
        echo "Error dalam query: " . $conn->error;
    }

    $conn->close();
}

?>