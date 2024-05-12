<?php
include '../Database/connection.php';
 if(isset($_POST['Add_btn']))
 {
            $name = $_POST['name'];
            $course = $_POST['course'];
            $year = $_POST['year'];
            $section = $_POST['section'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $position = $_POST['position'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
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
                    echo "<script>alert('Name already exists in the database.');
            </script>";
                    exit();
                } else {
                    // Name does not exist, proceed with insertion
                    $stmt = $conn->prepare("INSERT INTO `user_account_db` (Name, Course, Year, Section, Username, Password, Position) VALUES (:name, :course, :year, :section, :username, :password, :position)");
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':course', $course);
                    $stmt->bindParam(':year', $year);
                    $stmt->bindParam(':section', $section);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $hashedPassword);
                    $stmt->bindParam(':position', $position);
                    $stmt->execute();
                    if($stmt)
                    {
                        echo "<script>
                        window.location.href='loader.html';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                        window.location.href='loaderX.html';
                        </script>";
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
 }
 ?>