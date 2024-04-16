<?php
include 'Database/connection.php'; // Include the database connection file

try {
    // Get form data
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO your_table_name (name, course, year, section, position, username, password) 
                            VALUES (:name, :course, :year, :section, :position, :username, :password)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':section', $section);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    // Execute the prepared statement
    $stmt->execute();

    echo "Data inserted successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
