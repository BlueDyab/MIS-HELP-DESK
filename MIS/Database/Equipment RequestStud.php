<?php
    //for students

    require './connection.php';
    
    header('Content-Type: application/json'); // Set header for JSON response
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Extract sanitized input data
            $Date = $_POST['date'];
            $Time = $_POST['time'];
            $Due_time = $_POST['duetime'];
            $Dept = $_POST['department'];
            $Request = $_POST['requestedItem'];
            $Purpose = $_POST['purpose'];
            $Student_Name = $_POST['Student'];
            $Student_No = $_POST['studentId'];
            $Course = $_POST['course'];
            $Year = $_POST['year'];
            $Section = $_POST['section'];
            $Email = $_POST['email'];
    
            // Prepare the SQL INSERT statement
            $stmt = $conn->prepare("INSERT INTO equipment_request_stud (Name, Student_No, Course, Year, Section, Department, `Request Item`, Purpose, Date, Time, Due_Time, Email) VALUES (:name, :stud_no, :course, :year, :section, :department, :request, :purpose, :date, :time, :duetime, :email)");
    
            // Bind parameters to placeholders
            $stmt->bindParam(':name', $Student_Name);
            $stmt->bindParam(':stud_no', $Student_No);
            $stmt->bindParam(':course', $Course);
            $stmt->bindParam(':year', $Year);
            $stmt->bindParam(':section', $Section);
            $stmt->bindParam(':department', $Dept);
            $stmt->bindParam(':request', $Request);
            $stmt->bindParam(':purpose', $Purpose);
            $stmt->bindParam(':date', $Date);
            $stmt->bindParam(':time', $Time);
            $stmt->bindParam(':duetime', $Due_time);
            $stmt->bindParam(':email', $Email);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Data could not be inserted.']);
            }
    
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    }
    
    // Close the database connection
    $conn = null;
    
    
?>
