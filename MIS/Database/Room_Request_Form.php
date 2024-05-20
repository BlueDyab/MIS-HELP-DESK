<?php
    require 'connection.php';
    if(isset($_POST['Room_btn_prof'])){
        $Date = $_POST['date'];
        $Time_in = $_POST['timeIn'];
        $Time_out = $_POST['timeOut'];
        $Total_Students = $_POST['total'];
        $Dept = $_POST['department'];
        $Name = $_POST['Professors'];
        $purpose = $_POST['purpose'];
        try{
            $stmt = $conn->prepare("INSERT INTO prof_room_request_form_db(`Date`,`Time_In`,`Time_Out`,`Total_Students`,`Dept`,`Name`,`Purpose`) VALUES (:date, :time_in, :time_out, :total_students, :department, :name, :purpose)");
            $stmt->bindParam(':date', $Date);
            $stmt->bindParam(':time_in', $Time_in);
            $stmt->bindParam(':time_out', $Time_out);
            $stmt->bindParam(':total_students', $Total_Students);
            $stmt->bindParam(':department', $Dept);
            $stmt->bindParam(':name', $Name);
            $stmt->bindParam(':purpose', $purpose);

            $stmt->execute();
            
            if($stmt){
                // Redirect to index.html#Service
                header("Location: ./Load.html");
                exit(); // Ensure that no other code is executed after the redirect
            }
            else{
                // Redirect to index.html#Service
                header("Location: ./LoadX.html");
                exit(); // Ensure that no other code is executed after the redirect
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        // Close the database connection
        $conn = null;
    }
?>


<?php
    require 'connection.php';
    if(isset($_POST['room_btn_stud'])){
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

        try{
            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO `stud_room_request_form_db`(`Student_Name`, `Student_Number`, `Year`, `Section`, `Course`, `Time_In`, `Time_Out`, `Date`, `Purpose`,`Prof_name`) VALUES (:name, :student_number, :year, :section, :course, :time, :timeout, :date, :purpose ,:prof_name)");

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

            // Execute the statement
            $stmt->execute();

            // Check if the insertion was successful
            if($stmt->rowCount() > 0){
                // Redirect to Load.html if successful
                header("Location: ./Load.html");
                exit(); // Ensure that no other code is executed after the redirect
            }
            else{
                // Redirect to LoadX.html if unsuccessful
                header("Location: ./LoadX.html");
                exit(); // Ensure that no other code is executed after the redirect
            }
        } catch(PDOException $e) {
            // Display error message
            echo "Error: " . $e->getMessage();
        }
    }
?>
