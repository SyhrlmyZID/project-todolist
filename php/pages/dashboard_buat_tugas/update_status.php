<?php

require '../../../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['task_id']) && isset($_POST['status'])) {
    $task_id = intval($_POST['task_id']);
    $status = ucfirst(strtolower(trim($_POST['status'])));

    // Pastikan status valid ('Tertunda' atau 'Selesai')
    if ($status !== 'Tertunda' && $status !== 'Selesai') {
      echo json_encode(['status' => 'error', 'message' => 'Status tidak valid']);
      exit;
    }

    // Update status di database
    $stmt = $conn->prepare("UPDATE tasks SET status = ?, updated_at = NOW() WHERE task_id = ?");
    $stmt->bind_param("si", $status, $task_id);

    if ($stmt->execute()) {
      echo json_encode(['status' => 'success', 'task_id' => $task_id, 'updated_status' => $status]);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui status: ' . $stmt->error]);
    }

    $stmt->close();
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Metode tidak valid']);
}
?>
