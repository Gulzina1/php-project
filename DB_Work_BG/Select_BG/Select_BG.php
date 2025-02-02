<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "L11_Baktybekkyzy_65603_BG"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicycle Sales Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        h1 {
            color: #333;
        }
        select {
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Bicycle Sales and Maintenance Information</h1>

<h2>Select a Bicycle</h2>
<select name="bicycles" id="bicycles">
    <option value="">Select a bicycle</option>
    <?php
   
    $result = mysqli_query($conn, "SELECT model_name FROM bicycles_BG");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['model_name']."'>".$row['model_name']."</option>";
    }
    ?>
</select>

<h2>Available Bicycles</h2>
<table>
    <thead>
        <tr>
            <th>Model Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        
        $result = mysqli_query($conn, "SELECT model_name, brand, price, stock_quantity FROM bicycles_BG");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['model_name']."</td>";
            echo "<td>".$row['brand']."</td>";
            echo "<td>$".$row['price']."</td>";
            echo "<td>".$row['stock_quantity']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<h2>Sales</h2>
<table>
    <thead>
        <tr>
            <th>Bicycle Model</th>
            <th>Customer Name</th>
            <th>Sale Date</th>
            <th>Quantity</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $result = mysqli_query($conn, "SELECT bicycles_BG.model_name, customers_BG.customer_name, sales_BG.sale_date, sales_BG.quantity, sales_BG.total_amount 
                                       FROM sales_BG 
                                       JOIN bicycles_BG ON sales_BG.bicycle_id = bicycles_BG.bicycle_id
                                       JOIN customers_BG ON sales_BG.customer_id = customers_BG.customer_id");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['model_name']."</td>";
            echo "<td>".$row['customer_name']."</td>";
            echo "<td>".$row['sale_date']."</td>";
            echo "<td>".$row['quantity']."</td>";
            echo "<td>$".$row['total_amount']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<h2>Maintenance Records</h2>
<table>
    <thead>
        <tr>
            <th>Bicycle Model</th>
            <th>Employee Name</th>
            <th>Maintenance Date</th>
            <th>Description</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>
        <?php
      
        $result = mysqli_query($conn, "SELECT bicycles_BG.model_name, employees_BG.employee_name, maintenance_BG.maintenance_date, maintenance_BG.description, maintenance_BG.cost
                                       FROM maintenance_BG
                                       JOIN bicycles_BG ON maintenance_BG.bicycle_id = bicycles_BG.bicycle_id
                                       JOIN employees_BG ON maintenance_BG.employee_id = employees_BG.employee_id");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['model_name']."</td>";
            echo "<td>".$row['employee_name']."</td>";
            echo "<td>".$row['maintenance_date']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>$".$row['cost']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php

mysqli_close($conn);
?>
