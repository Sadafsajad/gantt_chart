<?php
include 'db.php';
if (isset($_GET['taskId'])) {
    $taskId = $_GET['taskId'];
    $query = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $taskId);
    $stmt->execute();
    $result = $stmt->get_result();
    $task = $result->fetch_assoc();
    echo json_encode($task);
}
?>