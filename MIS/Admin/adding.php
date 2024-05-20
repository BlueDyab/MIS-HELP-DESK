<?php
include '../Database/connection.php';
if(isset($_POST['Add_btn'])) {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $position = $_POST['position'];

    try {
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the name already exists in the database
        $data = $conn->prepare("SELECT * FROM `user_account_db` WHERE Name = :names");
        $data->bindParam(':names', $name);
        $data->execute();
        $existingData = $data->fetch(PDO::FETCH_ASSOC);

        if ($existingData) {
            // Name already exists, do not add
            echo "<script>alert('Name already exists in the database.');</script>";
        } else {
            // Name does not exist, proceed with insertion
            $stmt = $conn->prepare("INSERT INTO `user_account_db` (Name, Course, Year, Section, Username, Password, Position, Status) VALUES (:name, :course, :year, :section, :username, :password, :position, 'Active')"); // Set the status as 'Active'
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':course', $course);
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':section', $section);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':position', $position);
            $stmt->execute();
            echo "<script>alert('New user added successfully.');</script>";
            // Redirect to another page
            header("Location: ./loader.html");
            exit; // Make sure to exit after the redirection
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header("Location: ./loaderX.html");
            exit; // Make sure to exit after the redirection
    }
}
?>
