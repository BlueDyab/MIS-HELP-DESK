<?php
session_start();

// Unset or remove the session variable
unset($_SESSION['editButtonClickedId']);

// Send a response back to the client
http_response_code(200);
echo "Session variable cleared successfully.";
?>