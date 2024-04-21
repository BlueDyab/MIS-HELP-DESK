<?php
    require 'connection.php';
    if(isset($_POST["service-btn"])){
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
            $sql = "INSERT INTO service_request_db (Staff_Name, Dept, Date, Details, Action_Taken, Recommendation, Time, Due_Time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $department, $date, $details, $action, $recomm, $time, $duetime]);
            if($stmt){
                echo "<script>
                window.location.href='../index.html#service';
                </script>";
            }
            else{
                echo "<script>
                        window.location.href='./index.html#service';
                        </script>";
            }

        } catch(PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
}

    // Close the database connection
