<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['taskId'];

    $query = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt->execute([$taskId])) {
        echo 'success'; // Indicate successful deletion
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error deleting task: " . $errorInfo[2]; // Display the error message
    }
}
?>