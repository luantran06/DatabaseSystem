<?php
require 'db_connection.php'; // Import the connections
function getRecommendedRestaurants($user_id, $restaurant_conn, $user_conn) {
    // Ensure the user exists in the users database
    $user_check_query = "SELECT id FROM users.users WHERE id = ?";
    $user_stmt = $user_conn->prepare($user_check_query);
    $user_stmt->bind_param("i", $user_id);
    $user_stmt->execute();
    $user_result = $user_stmt->get_result();

    if ($user_result->num_rows === 0) {
        return []; // Return empty if the user doesn't exist
    }

    // Fetch recommended restaurants
    $query = "
        SELECT r.id, r.name, r.category, AVG(rv.rating) as avg_rating
        FROM restaurant_info.restaurants r
        JOIN restaurant_info.reviews rv ON r.id = rv.restaurant_id
        WHERE rv.user_id != ? 
        GROUP BY r.id
        ORDER BY avg_rating DESC
        LIMIT 5";

    $stmt = $restaurant_conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
