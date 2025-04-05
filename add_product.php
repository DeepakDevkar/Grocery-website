<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "gro"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission and file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product data
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];

    // Handle image upload
    if (isset($_FILES['product-image']) && $_FILES['product-image']['error'] == 0) {
        $imageTmpName = $_FILES['product-image']['tmp_name'];
        $imageName = $_FILES['product-image']['name'];
        $imageSize = $_FILES['product-image']['size'];
        $imageError = $_FILES['product-image']['error'];
        
        // Specify the allowed file types and max file size
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 2 * 1024 * 1024; // 2MB
        
        if (in_array($_FILES['product-image']['type'], $allowedTypes) && $imageSize <= $maxSize) {
            // Generate a unique file name to avoid conflicts
            $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageNewName = uniqid('', true) . '.' . $imageExtension;
            $imageDestination = 'uploads/' . $imageNewName;

            // Move the uploaded file to the uploads folder
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                // Insert product details into the database
                $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $productName, $productPrice, $imageDestination);

                if ($stmt->execute()) {
                    header("Location: testing.php?added=1");

                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Invalid image file or file too large.";
        }
    } else {
        echo "No image uploaded.";
    }
}

$conn->close();
?>
