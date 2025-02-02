<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate Employee Data (ClassA)</title>
</head>
<body>
    <h1>Validate Employee Data (ClassA)</h1>
    <form method="POST">
        <label for="employee_name">Employee Name:</label>
        <input type="text" id="employee_name" name="employee_name" required><br><br>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br><br>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required><br><br>

        <button type="submit">Validate and Add</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employee_name = trim($_POST['employee_name']);
        $position = trim($_POST['position']);
        $department = trim($_POST['department']);

        if (empty($employee_name) || empty($position) || empty($department)) {
            echo "<p>Invalid input! Please fill all fields.</p>";
        } else {
            echo "<p>Validation successful. Proceeding to add...</p>";
            include 'doAdd_ClassA.php';
        }
    }
    ?>
</body>
</html>