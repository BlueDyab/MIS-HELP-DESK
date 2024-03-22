<?php
    require 'connection.php';
    
    $Name = $_POST['name'];
    $DateTime = $_POST['dateTime'];
    $Dept = $_POST['department'];
    $Purpose = $_POST['purpose'];
    $Request = $_POST['requestedItem'];

    try {        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the SQL INSERT statement
        $stmt = $conn->prepare("INSERT INTO equipment_request_prof (`Name`, `Request Item`, `Dept`, `Purpose` `Date&Time`) VALUES (:name, :request, :department, :purpose, :date&time)");
        
        // Bind parameters to placeholders
        $stmt->bindParam(':name', $Name);
        $stmt->bindParam(':request', $Request);
        $stmt->bindParam(':department', $Dept);
        $stmt->bindParam(':purpose', $Purpose);
        $stmt->bindParam(':date&time', $DateTime);
        
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