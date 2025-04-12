<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "your_database_name");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch electronic products
$sql = "SELECT * FROM products WHERE category = 'electronics'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="images/' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '">';
        echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
        echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '<strong>$' . htmlspecialchars($row["price"]) . '</strong>';
        echo '</div>';
    }
} else {
    echo "No electronic products found.";
}

$conn->close();
?>