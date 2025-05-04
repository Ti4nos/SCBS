<?php
require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $items = $_POST['itemname'];
    $quantities = $_POST['quantity'];
    $prices = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO transactionitem (itemname, quantity, price) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sid", $itemname, $quantity, $price);

    for ($i = 0; $i < count($items); $i++) {
        $itemname = $items[$i];
        $quantity = intval($quantities[$i]);
        $price = floatval($prices[$i]);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    echo "Items successfully saved to database.";
    header("Location:index.php");
} else {
    echo "Invalid request.";
    
}
?>