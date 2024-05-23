<?php
require '../Database/connection.php';
session_start();

// Check if it's a POST request and if the 'pin' parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pin'])) {
    // Get the PIN from the POST parameters
    $pin = $_POST['pin'];

    try {
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL SELECT statement to fetch the password
        $stmt = $conn->prepare("SELECT Password FROM user_account_db WHERE Position = 'admin'");
        $stmt->execute();
        $password = $stmt->fetchColumn();

        // Verify if the password matches the entered PIN
        if ($password && $pin === $password) {
            // PIN is valid, send a JSON response indicating success
            echo json_encode(array('valid' => true));
            exit;
        } else {
            // PIN is invalid, send a JSON response indicating failure
            echo json_encode(array('valid' => false, 'message' => 'Invalid PIN.'));
            exit;
        }
    } catch(PDOException $e) {
        // Handle database connection errors
        echo json_encode(array('error' => 'Database error: ' . $e->getMessage()));
        exit;
    }
} else {
    // Invalid request, send a JSON response with an error message
    echo json_encode(array('error' => 'Invalid request.'));
    exit;
}
?>
