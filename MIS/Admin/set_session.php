<?php
// Start the session
session_start();
// Check if id is sent via POST
if(isset($_POST['id'])) {
    // Store the id in a session variable
    $_SESSION['editButtonClickedId'] = $_POST['id'];
    // Send a success response
    http_response_code(200);
    echo "ID stored in session";
} else {
    // Send an error response if id is not sent
    http_response_code(400);
    echo "Error: ID not provided";
}
?>