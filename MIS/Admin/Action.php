<?php
    require '../Database/connection.php';
    session_start();
    if (isset($_POST['id']) && isset($_POST['status'])) {
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

    if(isset($_POST['id']) && isset($_POST['status'])) {
        // Assuming you have a database connection using PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Get the ID and new status from the POST request
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        // Update the status in the database
        $sql = "UPDATE service_request_db SET Status = :status WHERE Id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //equipments request for professore
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        try {
            $stmt = $conn->prepare("UPDATE equipment_request_prof SET Status = ? WHERE Id = ?");
            $stmt->execute([$status, $id]);
    
            echo "Update successful";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if(isset($_POST['id']) && isset($_POST['status'])) {
        // Assuming you have a database connection using PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Get the ID and new status from the POST request
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        // Update the status in the database
        $sql = "UPDATE equipment_request_prof SET Status = :status WHERE Id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    //equipments request for student
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        try {
            $stmt = $conn->prepare("UPDATE equipment_request_stud SET Status = ? WHERE Id = ?");
            $stmt->execute([$status, $id]);
    
            echo "Update successful";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if(isset($_POST['id']) && isset($_POST['status'])) {
        // Assuming you have a database connection using PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Get the ID and new status from the POST request
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        // Update the status in the database
        $sql = "UPDATE equipment_request_stud SET Status = :status WHERE Id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //equipments request for professore
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        try {
            $stmt = $conn->prepare("UPDATE prof_room_request_form_db SET Status = ? WHERE Id = ?");
            $stmt->execute([$status, $id]);
    
            echo "Update successful";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if(isset($_POST['id']) && isset($_POST['status'])) {
        // Assuming you have a database connection using PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Get the ID and new status from the POST request
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        // Update the status in the database
        $sql = "UPDATE prof_room_request_form_db SET Status = :status WHERE Id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    //equipments request for student
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        try {
            $stmt = $conn->prepare("UPDATE stud_room_request_form_db SET Status = ? WHERE Id = ?");
            $stmt->execute([$status, $id]);
    
            echo "Update successful";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if(isset($_POST['id']) && isset($_POST['status'])) {
        // Assuming you have a database connection using PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Get the ID and new status from the POST request
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        // Update the status in the database
        $sql = "UPDATE stud_room_request_form_db SET Status = :status WHERE Id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logoutbtn'])) {
        session_unset();
        session_destroy();
        header('Location: ../login.html');
        exit;
    }
?>