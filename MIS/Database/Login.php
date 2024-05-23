<?php
session_start();
require './connection.php';

// Get the submitted username and password
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$password = isset($_SESSION['password']) ? $_SESSION['password'] : "";

try {
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL SELECT statement
    $stmt = $conn->prepare("SELECT `ID`, `Password` FROM `user_account_db` WHERE `Username` = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $acc = $stmt->fetch();

   // Check if a matching user account is found
   if ($acc) {
    if ($acc['Password'] === $password) {
        $_SESSION['Admin_ID'] = $acc["ID"];
        header("location: ../Admin/Admin.php");
        exit();
    } else {
        echo "<script>
                alert('Invalid username or password');
                window.location.href = '../login.html';
              </script>";
        exit();
    }
} else {
    // No matching user account found
    echo "<script>
            alert('Invalid username or password');
            window.location.href = '../login.html';
          </script>";
    exit();
}
} catch (PDOException $e) {
// Handle any database errors
echo "<script>
        alert('Error: " . $e->getMessage() . "');
        window.location.href = '../login.html';
      </script>";
exit();
}

// Close the database connection
$conn = null;
