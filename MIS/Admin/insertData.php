<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $position = $_POST['position'];

    try {
        // Assuming $conn is your database connection
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the name already exists in the database
        $data = $conn->prepare("SELECT * FROM `user_account_db` WHERE Name = :names");
        $data->bindParam(':names', $name);
        $data->execute();
        $existingData = $data->fetch(PDO::FETCH_ASSOC);

        if ($existingData) {
            // Name already exists, send error response to client
            http_response_code(400); // Bad Request
            echo "Name already exists in the database.";
            exit();
        } else {
            // Name does not exist, proceed with insertion
            $stmt = $conn->prepare("INSERT INTO `user_account_db` (Name, Course, Year, Section, Username, Password, Position) VALUES (:name, :course, :year, :section, :username, :password, :position)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':course', $course);
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':section', $section);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':position', $position);
            $stmt->execute();

            // Send success response to client
            echo "User added successfully!";
            exit();
        }
    } catch (PDOException $e) {
        // Handle database connection errors
        http_response_code(500); // Internal Server Error
        echo "Error: " . $e->getMessage();
        exit();
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method.";
    exit();
}
?>