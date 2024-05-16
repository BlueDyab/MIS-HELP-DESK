<?php
session_start();
require '../Database/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug: Output received POST data
    // var_dump($_POST);

    // Get the POST parameters
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $position = $_POST['position'];

    try {
        // Prepare the SQL UPDATE statement
        $stmt = $conn->prepare("UPDATE `user_account_db` SET Name = :name, Course = :course, Year = :year, Section = :section, Username = :username, Password = :password, Position = :position WHERE ID = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':section', $section);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Optionally, you can return a success message
        echo "Data updated successfully";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error updating data: " . $e->getMessage();
    }
}
?>
