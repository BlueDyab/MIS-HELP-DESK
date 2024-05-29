<?php
require './connection.php';

header('Content-Type: application/json'); // Set header for JSON response

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $Date = $_POST['date'];
        $Time_in = $_POST['timeIn'];
        $Time_out = $_POST['timeOut'];
        $Total_Students = $_POST['total'];
        $Dept = $_POST['department'];
        $Name = $_POST['Professors'];
        $purpose = $_POST['purpose'];
        $Email = $_POST['email'];
        try{
            $stmt = $conn->prepare("INSERT INTO prof_room_request_form_db(`Date`,`Time_In`,`Time_Out`,`Total_Students`,`Dept`,`Name`,`Purpose`,`Email`, `Status`) VALUES (:date, :time_in, :time_out, :total_students, :department, :name, :purpose, :email, 'Pending')");
            $stmt->bindParam(':date', $Date);
            $stmt->bindParam(':time_in', $Time_in);
            $stmt->bindParam(':time_out', $Time_out);
            $stmt->bindParam(':total_students', $Total_Students);
            $stmt->bindParam(':department', $Dept);
            $stmt->bindParam(':name', $Name);
            $stmt->bindParam(':purpose', $purpose);
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


