<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee (ObjectA)</title>
</head>
<body>
    <h1>Add Employee (ObjectA)</h1>
    <form method="POST">
        <label for="employee_name">Employee Name:</label>
        <input type="text" id="employee_name" name="employee_name" required><br><br>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br><br>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required><br><br>

        <button type="submit">Add Employee</button>
    </form>

    <?php
    include '../../DB_INCLUDE_YG/db.php'; // Database connection

    function addEmployee($employee_name, $position, $department) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO employee_YG (employee_name, position, department) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $employee_name, $position, $department);

        if ($stmt->execute()) {
            echo "<p>Employee added successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employee_name = trim($_POST['employee_name']);
        $position = trim($_POST['position']);
        $department = trim($_POST['department']);

        if (!empty($employee_name) && !empty($position) && !empty($department)) {
            addEmployee($employee_name, $position, $department);
        } else {
            echo "<p>Please fill in all fields.</p>";
        }
    }
    ?>
</body>
</html>