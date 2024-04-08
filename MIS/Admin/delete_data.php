<?php
session_start();
require '../Database/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID from the POST data
    $id = $_POST['id'];

    try {
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL DELETE statement
        $stmt = $conn->prepare("DELETE FROM user_account_db WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Return a success response
        http_response_code(200);
        exit;
    } catch (PDOException $e) {
        // Return an error response
        http_response_code(500);
        echo "Error: " . $e->getMessage();
        exit;
    }
}
?>