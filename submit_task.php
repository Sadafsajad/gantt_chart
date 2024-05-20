<?php
include 'db.php';

$taskTitle = $_POST['taskTitle'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$assignee = $_POST['AssignOption'];

$sql = "INSERT INTO tasks (task_name, start_date, end_date, assigned, is_active) VALUES ('$taskTitle', '$startDate', '$endDate', '$assignee', 1)";

if ($conn->query($sql) === TRUE) {
    echo "New task created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>