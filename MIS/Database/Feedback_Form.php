<?php
    require 'connection.php';
    if(isset($_POST['feedback_btn'])){
        $Name = $_POST['name'];
        $DateTime = $_POST['dateTime'];
        $Dept = $_POST['department'];
        $Feedback = $_POST['feedback'];
        $ActionTaken = $_POST['action'];
        $Reccommendation = $_POST['recomm'];
        try {        
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare the SQL INSERT statement
            $stmt = $conn->prepare("INSERT INTO feedback_form_db (`Name`, `Dept`, `feedback`, `Action_Taken`, `Recomm`, `Date&Time`) VALUES (:name, :department, :feedback, :action, :recomm, :dateTime)");
            
            // Bind parameters to placeholders
            $stmt->bindParam(':name', $Name);
            $stmt->bindParam(':dateTime', $DateTime);
            $stmt->bindParam(':department', $Dept);
            $stmt->bindParam(':feedback', $Feedback);
            $stmt->bindParam(':action', $ActionTaken);
            $stmt->bindParam(':recomm', $Reccommendation);
            
            // Insert a row
            $stmt->execute();
            
            // Redirect to index.html#Service
            header("Location: /MIS-HELP-DESK/MIS/index.html#Service");
            exit(); // Ensure that no other code is executed after the redirect
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        // Close the database connection
        $conn = null;
    }
?>