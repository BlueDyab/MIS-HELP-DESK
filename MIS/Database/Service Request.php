<?php
    require 'connection.php';
    if(isset($_POST["service-btn"])){
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            // Sanitize input data
            $date = htmlspecialchars($_POST['date']);
            $time = htmlspecialchars($_POST['time']);
            $duetime = htmlspecialchars($_POST['duetime']);
            $department = htmlspecialchars($_POST['department']);
            $action = htmlspecialchars($_POST['action2']);
            $name = htmlspecialchars($_POST['name']);
            $details = htmlspecialchars($_POST['details']);
            $recomm = htmlspecialchars($_POST['recomm']);

            // Prepare SQL query
            $sql = "INSERT INTO service_requests (date, time, due_time, department, action_taken, staff_name, details, recommendation) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$date, $time, $duetime, $department, $action, $name, $details, $recomm]);

            echo "Data inserted successfully";

        } catch(PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
}

    // Close the database connection
    $conn = null;
?>