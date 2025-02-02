<?php
include '../../DB_INCLUDE_YG/db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_name = trim($_POST['employee_name']);
    $position = trim($_POST['position']);
    $department = trim($_POST['department']);

    if (!empty($employee_name) && !empty($position) && !empty($department)) {
        $sql = "INSERT INTO employee_YG (employee_name, position, department) VALUES ('$employee_name', '$position', '$department')";
        if ($conn->query($sql)) {
            echo "Record added using connection object.";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
