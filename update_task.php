<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['taskId'];
    $taskTitle = $_POST['taskTitle'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $assignOption = $_POST['AssignOption'];

    $query = "UPDATE tasks SET task_name = ?, start_date = ?, end_date = ?, assigned = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssii', $taskTitle, $startDate, $endDate, $assignOption, $taskId);

    if ($stmt->execute()) {
        header('Location: gantt_chart.php'); // Redirect to your desired page
    } else {
        echo "Error updating task: " . $conn->error;
    }
}
?>