<?php

// Mengambil data pengguna dari tabel users
$sql = "SELECT user_id, name, email, role, created_at FROM users";
$result = $conn->query($sql);

// Jumlah data per halaman
$limit = 5;

// Halaman saat ini (default: 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Menghitung offset untuk pagination
$offset = ($page - 1) * $limit;

// Mengambil parameter pencarian jika ada
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Jika ada pencarian, buat query dengan filter
if ($searchQuery !== '') {
    $query = "SELECT * FROM users 
              WHERE user_id LIKE '%$searchQuery%' 
              OR name LIKE '%$searchQuery%' 
              OR email LIKE '%$searchQuery%' 
              ORDER BY CASE 
                  WHEN user_id LIKE '$searchQuery%' THEN 1 
                  WHEN name LIKE '$searchQuery%' THEN 2 
                  WHEN email LIKE '$searchQuery%' THEN 3 
                  ELSE 4 
              END";
} else {
    // Jika tidak ada pencarian, ambil data dengan batasan limit dan offset
    $query = "SELECT * FROM users LIMIT $limit OFFSET $offset";
}

// Eksekusi query
$result = $conn->query($query);

// Cek apakah query berhasil dijalankan
if (!$result) {
    die("Query Error: " . $conn->error);
}

// Inisialisasi total data dan total halaman
$totalData = 0;
$totalPages = 1;

// Jika tidak ada pencarian, hitung total data untuk pagination
if ($searchQuery === '') {
    $totalQuery = "SELECT COUNT(*) AS total FROM users";
    $totalResult = $conn->query($totalQuery);

    if ($totalResult) {
        $totalRow = $totalResult->fetch_assoc();
        $totalData = $totalRow['total'];
        $totalPages = ceil($totalData / $limit);
    }
}

// Menentukan entry awal dan akhir pada halaman saat ini
$startEntry = ($page - 1) * $limit + 1;
$endEntry = min($page * $limit, $totalData);

// Menentukan jumlah total data yang diambil
$totalEntries = $totalData ?? $result->num_rows;

?>
