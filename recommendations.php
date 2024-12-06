<?php
require 'db_connection.php'; // Include database connection script
require 'functions.php'; // Include the helper function file
session_start();

$user_id = $_POST['id']; // Get the user ID from the form submission

$recommendations = getRecommendedRestaurants($user_id, $restaurant_conn, $user_conn);

echo "<h2>Recommended Restaurants:</h2><ul>";
if (empty($recommendations)) {
    echo "<li>No recommendations available at this time.</li>";
} else {
    foreach ($recommendations as $restaurant) {
        echo "<li>{$restaurant['name']} - Cuisine: {$restaurant['cuisine']} (Rating: {$restaurant['avg_rating']})</li>";
    }
}
echo "</ul>";
?>
