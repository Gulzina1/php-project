<?php
include '../../DB_INCLUDE_YG/db.php'; // Database connection

function addEmployee($name, $position, $department) {
    global $conn;

    $sql = "INSERT INTO employee_YG (employee_name, position, department) VALUES ('$name', '$position', '$department')";
    if ($conn->query($sql)) {
        echo "Employee added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_name = trim($_POST['employee_name']);
    $position = trim($_POST['position']);
    $department = trim($_POST['department']);

    if (!empty($employee_name) && !empty($position) && !empty($department)) {
        addEmployee($employee_name, $position, $department);
    } else {
        echo "Please fill in all fields.";
    }
}
?>
