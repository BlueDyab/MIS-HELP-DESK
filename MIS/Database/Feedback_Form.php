<?php
require './connection.php';

header('Content-Type: application/json'); // Set header for JSON response

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    $Name = $_POST['name'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];
    $Dept = $_POST['department'];
    $Feedback = $_POST['Feedback'];
    $Reccommendation = $_POST['recomm'];
    $Email = $_POST['email'];


    // Set default name to "Anonymous" if no name is provided
    if (empty($Name)) {
        $Name = "Anonymous";
    }

    try {
        // Set the PDO error mode to exception

        // Prepare the SQL INSERT statement
        $stmt = $conn->prepare("INSERT INTO feedback_form_db (`Name`, `Dept`, `Feedback`, `Recomm`, `Date`, `Time`, `Email`) VALUES (:name, :department, :feedback, :recomm, :date, :time, :email)");

        // Bind parameters to placeholders
        $stmt->bindParam(':name', $Name);
        $stmt->bindParam(':date', $Date);
        $stmt->bindParam(':time', $Time);
        $stmt->bindParam(':department', $Dept);
        $stmt->bindParam(':feedback', $Feedback);
        $stmt->bindParam(':recomm', $Reccommendation);
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
