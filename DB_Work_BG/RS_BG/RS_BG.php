<?php

require_once 'resultset_ClassA.php';
require_once 'resultSet_ClassB.php';
require_once 'resultset_ConnObjectAB.php';
require_once 'resultSet_ObjectA.php';
require_once 'resultSet_ObjectB.php';


$db = new PDO('mysql:host=localhost;dbname=L11_Baktybekkyzy_65603_BG', 'root', '');
$stmt = $db->prepare("SELECT * FROM bicycles_BG");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>Bicycle ID</th>
            <th>Model Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?php echo $row['bicycle_id']; ?></td>
            <td><?php echo $row['model_name']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo '$' . number_format($row['price'], 2); ?></td>
            <td><?php echo $row['stock_quantity']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
