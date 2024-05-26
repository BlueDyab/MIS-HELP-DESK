<?php
 require './connection.php';
    
 header('Content-Type: application/json'); // Set header for JSON response


 //for prof or coors
 if ($_SERVER['REQUEST_METHOD'] === 'POST'){       
     $Prof_Name = $_POST['Professor'];
     $Date = $_POST['date'];
     $Time = $_POST['time'];
     $Due_time = $_POST['duetime'];
     $Dept = $_POST['department'];
     $Request = $_POST['requestedItem'];
     $Purpose = $_POST['purpose'];
    $Email = $_POST['email'];


     try { 
       
         // Prepare the SQL INSERT statement
         $stmt = $conn->prepare("INSERT INTO equipment_request_prof (`Professor_Name`,`Department`,`Date`,`Time`,`Due_Time`,`Requested_Item`,`Purpose`, `Email`) VALUES (:name, :department, :data, :time, :duetime, :request, :purpose, :email)");
         
         // Bind parameters to placeholders
         $stmt->bindParam(':name', $Prof_Name);
         $stmt->bindParam(':data', $Date);
         $stmt->bindParam(':time', $Time);
         $stmt->bindParam(':duetime', $Due_time);
         $stmt->bindParam(':department', $Dept);
         $stmt->bindParam(':request', $Request);
         $stmt->bindParam(':purpose', $Purpose);
        $stmt->bindParam(':email', $Email);

         
         if ($stmt->execute()) {
             echo json_encode(['status' => 'success']);
         } else {
             echo json_encode(['status' => 'error', 'message' => 'Data could not be inserted.']);
         }
 
     } catch (PDOException $e) {
         echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
     }
 } else {
     echo json_encode(['status' => 'error', 'message' => 'Invalid request method or missing parameters.']);
 }
 
 // Close the database connection
 $conn = null;



    
?>
