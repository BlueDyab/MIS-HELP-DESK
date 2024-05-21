<?php
// Include your database connection file
$servername = "localhost";
$username = "root";
$password = "";
$database = "mis_help_desk";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Ensure the user is logged in and the session variable is set
if (!isset($_SESSION['Admin_ID'])) {
    header('HTTP/1.0 403 Forbidden');
    exit('Forbidden: User is not authenticated.');
}

$userId = $_SESSION['Admin_ID'];

// Prepare the query to fetch the image data
$query = $conn->prepare("SELECT Avatar FROM user_account_db WHERE ID = ?");
if (!$query) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

$query->bind_param("i", $userId);

if (!$query->execute()) {
    die("Execute failed: (" . $query->errno . ") " . $query->error);
}

$query->store_result();
if ($query->num_rows === 0) {
    die("No image found for the user.");
}

$query->bind_result($avatar);
$query->fetch();

// Set the content type header to serve the image
header("Content-type: image/jpeg");

// Clear the output buffer to avoid any previous output issues
if (ob_get_length()) {
    ob_clean();
}

// Output the image data
echo $avatar;

$query->close();
$conn->close();
?>
