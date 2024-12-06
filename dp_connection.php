
<?php
// User database connection (reusing logic from tools/db.php)
function getUserDatabaseConnection() {
    $servername = "localhost";
    $username = "root"; // Replace with user DB username
    $password = ""; // Replace with user DB password
    $dbname = "users"; // Replace with user DB name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("User DB Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Restaurant database connection
function getRestaurantDatabaseConnection() {
    $servername = "localhost";
    $username = "root"; // Replace with restaurant DB username
    $password = ""; // Replace with restaurant DB password
    $dbname = "restaurant_info"; // Replace with restaurant DB name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Restaurant DB Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Use these functions to establish connections
$user_conn = getUserDatabaseConnection();
$restaurant_conn = getRestaurantDatabaseConnection();
?>
