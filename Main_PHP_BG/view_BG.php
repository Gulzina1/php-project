<?php
include '../DB_Include_BG/db.php';

$bicycles_result = $conn->query("SELECT * FROM bicycles_BG");
$customers_result = $conn->query("SELECT * FROM customers_BG");
$employees_result = $conn->query("SELECT * FROM employees_BG");
$sales_result = $conn->query("SELECT * FROM sales_BG");
$suppliers_result = $conn->query("SELECT * FROM suppliers_BG");
$supplies_result = $conn->query("SELECT * FROM supplies_BG");
$maintenance_result = $conn->query("SELECT * FROM maintenance_BG");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicycle Shop Data</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <h1>Bicycle Shop Data</h1>
    </header>
    <nav>
        <ul>
            <li><a href="start_BG.php">Home</a></li>
            <li><a href="view_BG.php">View Data</a></li>
            <li><a href="add_BG.php">Add Data</a></li>
        </ul>
    </nav>
    <main>
        <h3>Bicycles</h3>
        <table>
            <tr>
                <th>Bicycle ID</th>
                <th>Model Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Stock Quantity</th>
            </tr>
            <?php while ($row = $bicycles_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["bicycle_id"]; ?></td>
                <td><?php echo $row["model_name"]; ?></td>
                <td><?php echo $row["brand"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
                <td><?php echo $row["stock_quantity"]; ?></td>
            </tr>
            <?php } ?>
        </table>

        <h3>Customers</h3>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Contact Email</th>
                <th>Phone Number</th>
            </tr>
            <?php while ($row = $customers_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["customer_id"]; ?></td>
                <td><?php echo $row["customer_name"]; ?></td>
                <td><?php echo $row["contact_email"]; ?></td>
                <td><?php echo $row["phone_number"]; ?></td>
            </tr>
            <?php } ?>
        </table>

        <h3>Employees</h3>
        <table>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Position</th>
                <th>Salary</th>
            </tr>
            <?php while ($row = $employees_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["employee_id"]; ?></td>
                <td><?php echo $row["employee_name"]; ?></td>
                <td><?php echo $row["position"]; ?></td>
                <td><?php echo $row["salary"]; ?></td>
            </tr>
            <?php } ?>
        </table>

        <h3>Sales</h3>
        <table>
            <tr>
                <th>Sale ID</th>
                <th>Bicycle ID</th>
                <th>Customer ID</th>
                <th>Employee ID</th>
                <th>Sale Date</th>
                <th>Quantity</th>
                <th>Total Amount</th>
            </tr>
            <?php while ($row = $sales_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["sale_id"]; ?></td>
                <td><?php echo $row["bicycle_id"]; ?></td>
                <td><?php echo $row["customer_id"]; ?></td>
                <td><?php echo $row["employee_id"]; ?></td>
                <td><?php echo $row["sale_date"]; ?></td>
                <td><?php echo $row["quantity"]; ?></td>
                <td><?php echo $row["total_amount"]; ?></td>
            </tr>
            <?php } ?>
        </table>

        <h3>Suppliers</h3>
        <table>
            <tr>
                <th>Supplier ID</th>
                <th>Supplier Name</th>
                <th>Contact Email</th>
                <th>Phone Number</th>
            </tr>
            <?php while ($row = $suppliers_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["supplier_id"]; ?></td>
                <td><?php echo $row["supplier_name"]; ?></td>
                <td><?php echo $row["contact_email"]; ?></td>
                <td><?php echo $row["phone_number"]; ?></td>
            </tr>
            <?php } ?>
        </table>

        <h3>Supplies</h3>
        <table>
            <tr>
                <th>Supply ID</th>
                <th>Bicycle ID</th>
                <th>Supplier ID</th>
                <th>Supply Date</th>
                <th>Quantity</th>
            </tr>
            <?php while ($row = $supplies_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["supply_id"]; ?></td>
                <td><?php echo $row["bicycle_id"]; ?></td>
                <td><?php echo $row["supplier_id"]; ?></td>
                <td><?php echo $row["supply_date"]; ?></td>
                <td><?php echo $row["quantity"]; ?></td>
            </tr>
            <?php } ?>
        </table>

        <h3>Maintenance</h3>
        <table>
            <tr>
                <th>Maintenance ID</th>
                <th>Bicycle ID</th>
                <th>Employee ID</th>
                <th>Maintenance Date</th>
                <th>Description</th>
                <th>Cost</th>
            </tr>
            <?php while ($row = $maintenance_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["maintenance_id"]; ?></td>
                <td><?php echo $row["bicycle_id"]; ?></td>
                <td><?php echo $row["employee_id"]; ?></td>
                <td><?php echo $row["maintenance_date"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["cost"]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>
