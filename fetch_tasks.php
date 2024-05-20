<?php
include 'db.php';

$sql = "SELECT tasks.id, tasks.task_name, tasks.start_date, tasks.end_date, assigne.name, assigne.image FROM tasks JOIN assigne ON tasks.assigned = assigne.id WHERE tasks.is_active = 1";
$result = $conn->query($sql);

$tasks = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

echo json_encode($tasks);

$conn->close();
?>