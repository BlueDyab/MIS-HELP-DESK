<?php
    require 'connection.php';
    if(isset($_POST["Send_btn"])){
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Message = $_POST['message'];
        try {        
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare the SQL INSERT statement
            $stmt = $conn->prepare("INSERT INTO message_us_db (`Name`, `Email`, `Message`) VALUES (:name, :email, :message)");
            
            // Bind parameters to placeholders
            $stmt->bindParam(':name', $Name);
            $stmt->bindParam(':email', $Email);
            $stmt->bindParam(':message', $Message);
            
            // Insert a row
            $stmt->execute();
            
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