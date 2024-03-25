<?php
    require 'connection.php';
    if(isset($_POST['login_btn'])){
        // Get the submitted username and password
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Check if username and password are provided
        if(empty($username) || empty($password)){
            // Redirect back to the login page with an error message
            header("location: ../login.html?error=emptyfields");
            exit();
        } else {
            // Validate the email format
            if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
                // Redirect back to the login page with an error message
                header("location: ../login.html?error=invalidemail");
                exit();
            } else {
                try {        
                    // Set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // Prepare the SQL SELECT statement
                    $stmt = $conn->prepare("SELECT `ID`, `Name`, `Username`, `Password` FROM `user_account_db` WHERE `Username` = :username AND `Password` = :password");
                    
                    // Bind parameters to placeholders
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    
                    // Execute the query
                    $stmt->execute();
                    
                    // Fetch the result
                    $acc = $stmt->fetch();
                    
                    // Check if a matching user account is found
                    if($acc){
                        // Redirect to the admin page
                        header("location: ../Admin/Admin.html");
                        exit();
                    } else {
                        // Redirect back to the login page with an error message
                        header("location: ../login.html?error=invalidlogin");
                        exit();
                    }
                } catch(PDOException $e) {
                    // Handle any database errors
                    echo "Error: " . $e->getMessage();
                }
            }
        }
        
        // Close the database connection
        $conn = null;
    }
?>