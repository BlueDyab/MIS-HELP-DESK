<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_SESSION['Admin_ID']; // Assume user ID is stored in the session
    $newUsername = $_POST['user'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'mis_help_desk');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Check if the current password is correct
    $sql = "SELECT Password FROM user_account_db WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $stmt->bind_result($storedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($currentPassword === $storedPassword) {
        // Update username and password
        $sql = "UPDATE user_account_db SET Username = ?, Password = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $newUsername, $newPassword, $userID);
        if ($stmt->execute()) {
            echo "Username and password updated successfully!";
        } else {
            echo "Error updating username and password!";
        }
        $stmt->close();
    } else {
        echo "Current password is incorrect!";
    }

    $conn->close();
}
