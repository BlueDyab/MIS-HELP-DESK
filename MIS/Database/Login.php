<?php
    session_start();
    require 'connection.php';

    // Get the submitted username and password
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : "";

    try {        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the SQL SELECT statement
        $stmt = $conn->prepare("SELECT `ID`, `Name`, `Username`, `Password` FROM `user_account_db` WHERE `Username` = :username");
        
        // Bind parameters to placeholders
        $stmt->bindParam(':username', $username);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch the result
        $acc = $stmt->fetch();
        var_dump($acc);
        // Check if a matching user account is found
        if($acc && $password === $acc['Password']){
            // Redirect to the admin page
            header("location: ../Admin/Admin.html");
            exit();
        } else {
            // Redirect back to the login page with an error message
            //header("location: ../login.html");
            //exit();
            echo "false";
        }
    } catch(PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;
?>

