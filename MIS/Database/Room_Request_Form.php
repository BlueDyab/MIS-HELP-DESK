<?php
    require 'connection.php';
    if(isset($_POST['Room_btn_prof'])){
        $Date = $_POST['date'];
        $Time_in = $_POST['time_in'];
        $Time_out = $_POST['time_out'];
        $Total_Students = $_POST['total_students'];
        $Dept = $_POST['department'];
        $Name = $_POST['name'];
        $purpose = $_POST['purpose'];
        try{
            $stmt = $conn->prepare("INSERT INTO room_request_form_db (`Date`,`Time_In`,`Time_Out`,`Total_Students`,`Dept`,`Name`,`Purpose`) VALUES (:date, :time_in, :time_out, :total_students, :department, :name, :purpose)");
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
            $Time_in = $_POST['time_in'];
            $Time_out = $_POST['time_out'];
            $Course = $_POST['course'];
            $Year = $_POST['year'];
            $Section = $_POST['section'];
            $Student_Name = $_POST['name'];
            $Student_No = $_POST['studentID'];
            $Prof_Name = $_POST['prof_name'];
            $Purpose = $_POST['purpose'];
        try{
            $stmt = $conn->prepare("INSERT INTO room_request_form_db (`Date`,`Time_In`,`Time_Out`,`Course`,`Year`,`Section`,`Student_Name`,`Student_No`,`Prof_Name`,`Purpose`) VALUES (:date, :time_in, :time_out, :course, :year, :section, :name, :studentID, :prof_name, :purpose)");
            $stmt->bindParam(':date', $Date);
            $stmt->bindParam(':time_in', $Time_in);
            $stmt->bindParam(':time_out', $Time_out);
            $stmt->bindParam(':course', $Course);
            $stmt->bindParam(':year', $Year);
            $stmt->bindParam(':section', $Section);
            $stmt->bindParam(':name', $Student_Name);
            $stmt->bindParam(':studentID', $Student_No);
            $stmt->bindParam(':prof_name', $Prof_Name);
            $stmt->bindParam(':purpose', $Purpose);

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