<?php
$conn = new mysqli("localhost", "root", "", "gro");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, image FROM products";
$result = $conn->query($sql);

$products = [];

while ($row = $result->fetch_assoc()) {
    // Ensure the correct image path is sent to the frontend
    $imagePath = 'uploads/' . $row['image']; 

    // Make sure the image path does not have duplicate slashes
    $imagePath = str_replace('//', '/', $imagePath);

    // If accessing locally, adjust the path to be absolute if needed
    $row['image'] = 'http://localhost/Grocy%20Project/' . $imagePath;


    $products[] = $row;
}

echo json_encode($products);
$conn->close();
?>
