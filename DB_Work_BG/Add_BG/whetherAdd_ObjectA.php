<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_name = trim($_POST['employee_name']);
    $position = trim($_POST['position']);
    $department = trim($_POST['department']);

    if (empty($employee_name) || empty($position) || empty($department)) {
        die("Invalid input! Please fill all fields.");
    }

    include 'doAdd_ObjectA.php'; // Include the page for adding data
}
?>
