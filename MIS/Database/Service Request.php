<?php
    require 'connection.php';
    
    $Name = $_POST['name'];
    $DateTime = $_POST['dateTime'];
    $Dept = $_POST['department'];
    $Details = $_POST['details'];
    $ActionTaken = $_POST['service'];
    $Reccommendation = $_POST['recomm'];
    try {        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the SQL INSERT statement
        $stmt = $conn->prepare("INSERT INTO service_request_db (`Name`, `Date&Time`, `Dept`, `Details`, `Action Taken`, Recommendation) VALUES (:name, :dateTime, :department, :details, :service, :recomm)");
        
        // Bind parameters to placeholders
        $stmt->bindParam(':name', $Name);
        $stmt->bindParam(':dateTime', $DateTime);
        $stmt->bindParam(':department', $Dept);
        $stmt->bindParam(':details', $Details);
        $stmt->bindParam(':service', $ActionTaken);
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
?>