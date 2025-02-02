<?php
include '../../DB_INCLUDE_YG/db.php'; // Database connection

class Employee {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function add($name, $position, $department) {
        $sql = "INSERT INTO employee_YG (employee_name, position, department) VALUES ('$name', '$position', '$department')";
        if ($this->conn->query($sql)) {
            echo "Employee added successfully!";
        } else {
            echo "Error: " . $this->conn->error;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_name = trim($_POST['employee_name']);
    $position = trim($_POST['position']);
    $department = trim($_POST['department']);

    if (!empty($employee_name) && !empty($position) && !empty($department)) {
        $employee = new Employee($conn);
        $employee->add($employee_name, $position, $department);
    } else {
        echo "Please fill in all fields.";
    }
}
?>
