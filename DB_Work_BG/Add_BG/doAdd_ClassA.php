<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>
    <form method="POST" action="">
        <label for="employee_name">Employee Name:</label><br>
        <input type="text" id="employee_name" name="employee_name" required><br><br>

        <label for="position">Position:</label><br>
        <input type="text" id="position" name="position" required><br><br>

        <label for="department">Department:</label><br>
        <input type="text" id="department" name="department" required><br><br>

        <button type="submit">Add Employee</button>
    </form>

    <?php
    include '../../DB_INCLUDE_YG/db.php'; // Database connection

    class Database {
        private $conn;

        public function __construct($connection) {
            $this->conn = $connection;
        }

        public function addRecord($table, $data) {
            $columns = implode(", ", array_keys($data));
            $values = implode(", ", array_map(fn($val) => "'" . $this->conn->real_escape_string($val) . "'", array_values($data)));

            $sql = "INSERT INTO $table ($columns) VALUES ($values)";
            if ($this->conn->query($sql)) {
                echo "<p>Record added successfully!</p>";
            } else {
                echo "<p>Error: " . $this->conn->error . "</p>";
            }
        }
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employee_name = trim($_POST['employee_name']);
        $position = trim($_POST['position']);
        $department = trim($_POST['department']);

        if (empty($employee_name) || empty($position) || empty($department)) {
            echo "<p>Invalid input! Please fill all fields correctly.</p>";
        } else if (isset($conn)) {
            $db = new Database($conn);
            $db->addRecord("employee_YG", [
                "employee_name" => $employee_name,
                "position" => $position,
                "department" => $department
            ]);
        } else {
            echo "<p>Database connection not established.</p>";
        }
    }
    ?>
</body>
</html>
