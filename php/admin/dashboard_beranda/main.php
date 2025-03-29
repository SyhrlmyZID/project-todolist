<?php

// Total pengguna
$queryUsers = "SELECT COUNT(*) AS total_users FROM users";
$resultUsers = $conn->query($queryUsers);
$totalUsers = $resultUsers->fetch_assoc()['total_users'];

// Total Tugas Pengguna
$queryTasks = "SELECT COUNT(*) AS total_tasks FROM tasks";
$resultTasks = $conn->query($queryTasks);
$totalTasks = $resultTasks->fetch_assoc()['total_tasks'];

?>