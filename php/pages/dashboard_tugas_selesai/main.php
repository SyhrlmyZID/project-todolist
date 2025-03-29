<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$limit = 5; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

if (!empty($search)) {
    // Query menampilkan semua tugas selesai dengan pencarian tanpa limit
    $query = "SELECT task_id, task_name, deadline, priority, status FROM tasks 
              WHERE user_id = ? AND status = 'selesai' AND task_name LIKE ? 
              ORDER BY created_at DESC";
    $stmt = $conn->prepare($query);
    $likeSearch = "%{$search}%";
    $stmt->bind_param("is", $user_id, $likeSearch);

    // Hitung total data untuk pencarian
    $total_tasks = 0; // Tidak perlu total_pages untuk pencarian
} else {
    // Query menampilkan tugas selesai tanpa pencarian dengan limit
    $query = "SELECT task_id, task_name, deadline, priority, status FROM tasks 
              WHERE user_id = ? AND status = 'selesai' 
              ORDER BY created_at DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $user_id, $limit, $offset);

    // Hitung total data tanpa pencarian
    $total_query = "SELECT COUNT(*) as total FROM tasks WHERE user_id = ? AND status = 'selesai'";
    $total_stmt = $conn->prepare($total_query);
    $total_stmt->bind_param("i", $user_id);
    $total_stmt->execute();
    $total_result = $total_stmt->get_result();
    $total_tasks = $total_result->fetch_assoc()['total'];
    $total_pages = ceil($total_tasks / $limit);
}

// Eksekusi query tugas
$stmt->execute();
$result = $stmt->get_result();
$tasks = $result->fetch_all(MYSQLI_ASSOC);

?>
