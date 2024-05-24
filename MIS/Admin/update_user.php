<?php
session_start();
// Check for a valid session and user authentication.
if (!isset($_SESSION['Admin_ID'])) {
    die("Access denied: Please login.");
}

include '../Database/connection.php'; // Include your database configuration file

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$adminID = $_SESSION['Admin_ID']; // Fetching the Admin_ID from session

// Fetch user input directly
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

// Check if new passwords match
if ($newPassword !== $confirmPassword) {
    die("Error: New passwords do not match.");
}

// Fetch the current password from the database
$sql = "SELECT Password FROM user_account_db WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $adminID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("No user found with the provided ID.");
}
$user = $result->fetch_assoc();

// Verify current password with the stored plain text password
if ($currentPassword === $user['Password']) {
    $updateSql = "UPDATE user_account_db SET Password = ? WHERE ID = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("si", $newPassword, $adminID);
    $updateStmt->execute();

    if ($updateStmt->affected_rows > 0) {
        echo "Password updated successfully.";
    } else {
        echo "Failed to update password.";
    }
    $updateStmt->close();
} else {
    echo "Invalid current password.";
}

$conn->close();
?>
