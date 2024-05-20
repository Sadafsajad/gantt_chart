<?php
include 'db.php';

$sql = "SELECT id, name FROM assigne";
$result = $conn->query($sql);

$options = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
} else {
    $options = "<option value=''>No assignees available</option>";
}

echo $options;

$conn->close();
?>