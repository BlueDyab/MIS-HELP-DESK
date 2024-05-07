<?php
    require '../Database/connection.php';
    // if (isset($_POST['id']) && isset($_POST['status'])) {
    //     $id = $_POST['id'];
    //     $status = $_POST['status'];
    
    //     try {
    //         $stmt = $conn->prepare("UPDATE service_request_db SET Status = ? WHERE Id = ?");
    //         $stmt->execute([$status, $id]);
    
    //         echo "Update successful";
    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // if(isset($_POST['id']) && isset($_POST['status'])) {
    //     // Assuming you have a database connection using PDO
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //     // Get the ID and new status from the POST request
    //     $id = $_POST['id'];
    //     $status = $_POST['status'];
    
    //     // Update the status in the database
    //     $sql = "UPDATE your_table_name SET Status = :status WHERE Id = :id";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(':status', $status);
    //     $stmt->bindParam(':id', $id);
    //     $stmt->execute();
    // }
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        // Include any necessary files and setup database connection if needed
    
        // Check if 'id' and 'status' parameters are set
        if(isset($_POST['id']) && isset($_POST['status'])) {
            $id = $_POST['id'];
            $status = $_POST['status'];
            
            // Call the appropriate function based on the status
            if($status === 'On-going') {
                updateStatusToOngoing($id);
            } elseif($status === 'Done') {
                updateStatusToDone($id);
            } else {
                // Handle invalid status
                echo 'Invalid status';
            }
        } else {
            // Handle missing parameters
            echo 'Missing parameters';
        }
    }
    
    // Function to update status to "On-going"
    function updateStatusToOngoing($id) {
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        try {
            $stmt = $conn->prepare("UPDATE service_request_db SET Status = ? WHERE Id = ?");
            $stmt->execute([$status, $id]);
    
            echo "Update successful";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    // Function to update status to "Done"
    function updateStatusToDone($id) {
        // Assuming you have a database connection using PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Get the ID and new status from the POST request
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        // Update the status in the database
        $sql = "UPDATE your_table_name SET Status = :status WHERE Id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
?>