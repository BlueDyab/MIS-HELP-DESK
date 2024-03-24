<?php
    require 'connection.php';
    if(isset($_POST['Login_btn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        try {        
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare the SQL INSERT statement
            $stmt = $conn->prepare("SELECT `ID`, `Name`, `Username`, `Password` FROM `user_account_db` WHERE `Username` = :username AND 'Password' = :password");
            
            // Bind parameters to placeholders
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            
            // Insert a row
            $stmt->execute();
            $stmt->fetch();
            if(!$stmt == 0){
                echo "<alert='successful'>";
            }
            // Redirect to index.html#Service
            header("Location: /MIS-HELP-DESK/MIS/index.html#contact");
            exit(); // Ensure that no other code is executed after the redirect
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
            
            // Close the database connection
            $conn = null;
    }
?>