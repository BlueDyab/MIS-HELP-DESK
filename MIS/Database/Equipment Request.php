<?php
    require 'connection.php';
    //for prof or coors
    if(isset($_POST['prof_btn'])){       
        $Prof_Name = $_POST['Professor'];
        $Date = $_POST['date'];
        $Time = $_POST['time'];
        $Due_time = $_POST['duetime'];
        $Dept = $_POST['department'];
        $Request = $_POST['requestedItem'];
        $Purpose = $_POST['purpose'];

        try { 
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare the SQL INSERT statement
            $stmt = $conn->prepare("INSERT INTO equipment_request_prof (`Professor_Name`,`Department`,`Date`,`Time`,`Due_Time`,`Requested_Item`,`Purpose`) VALUES (:name, :department, :data, :time, :duetime, :request, :purpose)");
            
            // Bind parameters to placeholders
            $stmt->bindParam(':name', $Prof_Name);
            $stmt->bindParam(':data', $Date);
            $stmt->bindParam(':time', $Time);
            $stmt->bindParam(':duetime', $Due_time);
            $stmt->bindParam(':department', $Dept);
            $stmt->bindParam(':request', $Request);
            $stmt->bindParam(':purpose', $Purpose);

            
            // Insert a row
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

    //for students
    if(isset($_POST['stud_btn'])){       
        $Date = $_POST['date'];
        $Time = $_POST['time'];
        $Due_time = $_POST['duetime'];
        $Course = $_POST['course'];
        $Year = $_POST['year'];
        $Section = $_POST['section'];
        $Student_Name = $_POST['Student'];
        $Student_No = $_POST['studentId'];
        $Dept = $_POST['department'];
        $Request = $_POST['requestedItem'];
        $Purpose = $_POST['purpose'];
        
        

        try { 
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare the SQL INSERT statement
            $stmt = $conn->prepare("INSERT INTO equipment_request_stud (`Name`,`Student_No`,`Course`,`Year`,`Section`,`Department`,`Request Item`,`Purpose`,`Date`,`Time`,`Due_Time`) VALUES (:name, :stud_no, :course, :year, :section, :department, :request, :purpose, :data, :time, :duetime)");
            
            // Bind parameters to placeholders
            $stmt->bindParam(':name', $Student_Name);
            $stmt->bindParam(':stud_no', $Student_No);
            $stmt->bindParam(':request', $Request);
            $stmt->bindParam(':purpose', $Purpose);
            $stmt->bindParam(':data', $Date);
            $stmt->bindParam(':time', $Time);
            $stmt->bindParam(':duetime', $Due_time);
            $stmt->bindParam(':department', $Dept);
            $stmt->bindParam(':course', $Course);
            $stmt->bindParam(':year', $Year);
            $stmt->bindParam(':section', $Section);

            
            // Insert a row
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
