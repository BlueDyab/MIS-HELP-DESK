
<?php
   require './connection.php';

   header('Content-Type: application/json'); // Set header for JSON response
   
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Date = $_POST['date'];
        $Time = $_POST['timeIn'];
        $TimeOut = $_POST['timeOut'];
        $Course = $_POST['course'];
        $Year = $_POST['year'];
        $Section = $_POST['section'];
        $Name = $_POST['Student1'];
        $Student_Number = $_POST['studentID'];
        $Prof_Name = $_POST['Professor1'];
        $Purpose = $_POST['purpose'];
        $Email = $_POST['email'];

        try{
            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO `stud_room_request_form_db`(`Student_Name`, `Student_Number`, `Year`, `Section`, `Course`, `Time_In`, `Time_Out`, `Date`, `Purpose`,`Prof_name`, `Email`, `Status`) VALUES (:name, :student_number, :year, :section, :course, :time, :timeout, :date, :purpose ,:prof_name, :email, 'Pending')");

            // Bind parameters
            $stmt->bindParam(':date', $Date);
            $stmt->bindParam(':time', $Time);
            $stmt->bindParam(':timeout', $TimeOut);
            $stmt->bindParam(':course', $Course);
            $stmt->bindParam(':year', $Year);
            $stmt->bindParam(':section', $Section);
            $stmt->bindParam(':name', $Name);
            $stmt->bindParam(':student_number', $Student_Number);
            $stmt->bindParam(':prof_name', $Prof_Name);
            $stmt->bindParam(':purpose', $Purpose);
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
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method or missing parameters.']);
}

// Close the database connection
$conn = null;
?>
