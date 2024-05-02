<?php
    require 'connection.php';
    if(isset($_POST['feedback_btn'])){
        $Name = $_POST['name'];
        $Date = $_POST['date'];
        $Time = $_POST['time'];
        $Dept = $_POST['department'];
        $Feedback = $_POST['Feedback'];
        $Reccommendation = $_POST['recomm'];
        try {        
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare the SQL INSERT statement
            $stmt = $conn->prepare("INSERT INTO feedback_form_db (`Name`,`Dept`,`Feedback`,`Recomm`,`Date`,`Time`) VALUES (:name, :department, :feedback, :recomm, :date, :time)");
            
            // Bind parameters to placeholders
            $stmt->bindParam(':name', $Name);
            $stmt->bindParam(':date', $Date);
            $stmt->bindParam(':time', $Time);
            $stmt->bindParam(':department', $Dept);
            $stmt->bindParam(':feedback', $Feedback);
            $stmt->bindParam(':recomm', $Reccommendation);

            
            // Insert a row
            $stmt->execute();
            
            if($stmt){
                // Redirect to index.html#Service
                header("Location: ./Load.html");
                exit(); // Ensure that no other code is executed after the redirect
            }
            else{
                // Redirect to index.html#Service
                header("Location: ./LoadX.html");
                exit(); // Ensure that no other code is executed after the redirect
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        // Close the database connection
        $conn = null;
    }
?>