<?php

include '../../../config/connection.php'; // Pastikan ini berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $priority = $_POST['priority'];
    
    // Cek apakah deadline diisi atau tidak
    if (isset($_POST['deadline']) && !empty($_POST['deadline'])) {
        $deadline = $_POST['deadline'];
    } else {
        // Ambil nilai deadline lama dari database
        $query = "SELECT deadline FROM tasks WHERE task_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $task_id);
        $stmt->execute();
        $stmt->bind_result($existing_deadline);
        $stmt->fetch();
        $deadline = $existing_deadline; // Gunakan deadline yang ada sebelumnya
        $stmt->close();
    }

    // Update data di database
    $query = "UPDATE tasks SET task_name=?, deadline=?, priority=?, updated_at=NOW() WHERE task_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $task_name, $deadline, $priority, $task_id);

    if ($stmt->execute()) {
        header("Location: ../../../pages/dashboard_buat_tugas.php?success=Tugas berhasil diperbarui");
    } else {
        header("Location: ../../../pages/dashboard_buat_tugas.php?error=Gagal memperbarui tugas");
    }    

    $stmt->close();
    $conn->close();
}
?>
