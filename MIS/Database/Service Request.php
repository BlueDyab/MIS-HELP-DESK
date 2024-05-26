<?php
require './connection.php';

header('Content-Type: application/json'); // Set header for JSON response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Sanitize input data
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);
        $duetime = htmlspecialchars($_POST['duetime']);
        $department = htmlspecialchars($_POST['department']);
        $action = htmlspecialchars($_POST['action']);
        $name = htmlspecialchars($_POST['name']);
        $details = htmlspecialchars($_POST['details']);
        $recomm = htmlspecialchars($_POST['recomm']);
        $email = htmlspecialchars($_POST['email']);


        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO service_request_db (Staff_Name, Dept, Date, Details, Action_Taken, Recommendation, Time, Due_Time, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $department);
        $stmt->bindParam(3, $date);
        $stmt->bindParam(4, $details);
        $stmt->bindParam(5, $action);
        $stmt->bindParam(6, $recomm);
        $stmt->bindParam(7, $time);
        $stmt->bindParam(8, $duetime);
        $stmt->bindParam(9, $email);

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
