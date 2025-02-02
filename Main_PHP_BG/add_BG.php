<?php
include '../DB_Include_BG/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["add_bicycle"])) {
        $model_name = $_POST["model_name"];
        $brand = $_POST["brand"];
        $price = $_POST["price"];
        $stock_quantity = $_POST["stock_quantity"];

        $sql = "INSERT INTO bicycles_BG (model_name, brand, price, stock_quantity) VALUES ('$model_name', '$brand', '$price', '$stock_quantity')";
        $conn->query($sql);
    }

    if (isset($_POST["add_customer"])) {
        $customer_name = $_POST["customer_name"];
        $contact_email = $_POST["contact_email"];
        $phone_number = $_POST["phone_number"];

        $sql = "INSERT INTO customers_BG (customer_name, contact_email, phone_number) VALUES ('$customer_name', '$contact_email', '$phone_number')";
        $conn->query($sql);
    }

    if (isset($_POST["add_employee"])) {
        $employee_name = $_POST["employee_name"];
        $position = $_POST["position"];
        $salary = $_POST["salary"];

        $sql = "INSERT INTO employees_BG (employee_name, position, salary) VALUES ('$employee_name', '$position', '$salary')";
        $conn->query($sql);
    }

    if (isset($_POST["add_supplier"])) {
        $supplier_name = $_POST["supplier_name"];
        $contact_email = $_POST["contact_email"];
        $phone_number = $_POST["phone_number"];

        $sql = "INSERT INTO suppliers_BG (supplier_name, contact_email, phone_number) VALUES ('$supplier_name', '$contact_email', '$phone_number')";
        $conn->query($sql);
    }

    if (isset($_POST["add_supply"])) {
        $bicycle_id = $_POST["bicycle_id"];
        $supplier_id = $_POST["supplier_id"];
        $supply_date = $_POST["supply_date"];
        $quantity = $_POST["quantity"];

        $sql = "INSERT INTO supplies_BG (bicycle_id, supplier_id, supply_date, quantity) VALUES ('$bicycle_id', '$supplier_id', '$supply_date', '$quantity')";
        $conn->query($sql);
    }

    if (isset($_POST["add_sale"])) {
        $bicycle_id = $_POST["bicycle_id"];
        $customer_id = $_POST["customer_id"];
        $employee_id = $_POST["employee_id"];
        $sale_date = $_POST["sale_date"];
        $quantity = $_POST["quantity"];
        $total_amount = $_POST["total_amount"];

        $sql = "INSERT INTO sales_BG (bicycle_id, customer_id, employee_id, sale_date, quantity, total_amount) VALUES ('$bicycle_id', '$customer_id', '$employee_id', '$sale_date', '$quantity', '$total_amount')";
        $conn->query($sql);
    }

    if (isset($_POST["add_maintenance"])) {
        $bicycle_id = $_POST["bicycle_id"];
        $employee_id = $_POST["employee_id"];
        $maintenance_date = $_POST["maintenance_date"];
        $description = $_POST["description"];
        $cost = $_POST["cost"];

        $sql = "INSERT INTO maintenance_BG (bicycle_id, employee_id, maintenance_date, description, cost) VALUES ('$bicycle_id', '$employee_id', '$maintenance_date', '$description', '$cost')";
        $conn->query($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <h1>Add New Data</h1>
    </header>
    <nav>
        <ul>
            <li><a href="start_BG.php">Home</a></li>
            <li><a href="view_BG.php">View Data</a></li>
            <li><a href="add_BG.php">Add Data</a></li>
        </ul>
    </nav>
    <main>
        <h2>Add New Bicycle</h2>
        <form method="post">
            <label>Model Name:</label>
            <input type="text" name="model_name" required>
            <label>Brand:</label>
            <input type="text" name="brand" required>
            <label>Price:</label>
            <input type="number" step="0.01" name="price" required>
            <label>Stock Quantity:</label>
            <input type="number" name="stock_quantity" required>
            <button type="submit" name="add_bicycle">Add Bicycle</button>
        </form>

        <h2>Add New Customer</h2>
        <form method="post">
            <label>Customer Name:</label>
            <input type="text" name="customer_name" required>
            <label>Contact Email:</label>
            <input type="email" name="contact_email" required>
            <label>Phone Number:</label>
            <input type="text" name="phone_number">
            <button type="submit" name="add_customer">Add Customer</button>
        </form>

        <h2>Add New Employee</h2>
        <form method="post">
            <label>Employee Name:</label>
            <input type="text" name="employee_name" required>
            <label>Position:</label>
            <input type="text" name="position" required>
            <label>Salary:</label>
            <input type="number" step="0.01" name="salary" required>
            <button type="submit" name="add_employee">Add Employee</button>
        </form>

        <h2>Add New Supplier</h2>
        <form method="post">
            <label>Supplier Name:</label>
            <input type="text" name="supplier_name" required>
            <label>Contact Email:</label>
            <input type="email" name="contact_email">
            <label>Phone Number:</label>
            <input type="text" name="phone_number">
            <button type="submit" name="add_supplier">Add Supplier</button>
        </form>

        <h2>Add New Supply</h2>
        <form method="post">
            <label>Bicycle ID:</label>
            <input type="number" name="bicycle_id" required>
            <label>Supplier ID:</label>
            <input type="number" name="supplier_id" required>
            <label>Supply Date:</label>
            <input type="date" name="supply_date" required>
            <label>Quantity:</label>
            <input type="number" name="quantity" required>
            <button type="submit" name="add_supply">Add Supply</button>
        </form>

        <h2>Add New Sale</h2>
        <form method="post">
            <label>Bicycle ID:</label>
            <input type="number" name="bicycle_id" required>
            <label>Customer ID:</label>
            <input type="number" name="customer_id" required>
            <label>Employee ID:</label>
            <input type="number" name="employee_id" required>
            <label>Sale Date:</label>
            <input type="date" name="sale_date" required>
            <label>Quantity:</label>
            <input type="number" name="quantity" required>
            <label>Total Amount:</label>
            <input type="number" step="0.01" name="total_amount" required>
            <button type="submit" name="add_sale">Add Sale</button>
        </form>

        <h2>Add Maintenance</h2>
        <form method="post">
            <label>Bicycle ID:</label>
            <input type="number" name="bicycle_id" required>
            <label>Employee ID:</label>
            <input type="number" name="employee_id" required>
            <label>Maintenance Date:</label>
            <input type="date" name="maintenance_date" required>
            <label>Description:</label>
            <textarea name="description"></textarea>
            <label>Cost:</label>
            <input type="number" step="0.01" name="cost">
            <button type="submit" name="add_maintenance">Add Maintenance</button>
        </form>
    </main>
</body>
</html>
