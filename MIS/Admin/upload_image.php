<?php
session_start();
if (isset($_POST['submit'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mis_help_desk";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assume $userId is obtained from session or another reliable source
    $userId = $_SESSION['Admin_ID']; // Example

    // Check if a file was uploaded without errors
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $file = $_FILES['profile_picture'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = mime_content_type($fileTmpName); // Get MIME type

        // Define allowed file types and size limit
        $allowed = array('image/jpeg', 'image/png', 'image/gif');
        if (in_array($fileType, $allowed) && $fileSize < 5000000) { // 5MB limit
            // Read file content
            $fileContent = file_get_contents($fileTmpName);

            // Check if user already has a profile picture
            $sqlCheck = "SELECT Avatar FROM user_account_db WHERE ID = ?";
            $stmtCheck = $conn->prepare($sqlCheck);
            $stmtCheck->bind_param("i", $userId);
            $stmtCheck->execute();
            $result = $stmtCheck->get_result();

            if ($result->num_rows > 0) {
                // Update the existing profile picture
                $sqlUpdate = "UPDATE user_account_db SET Avatar = ?, AvatarType = ? WHERE ID = ?";
                $stmtUpdate = $conn->prepare($sqlUpdate);
                $stmtUpdate->bind_param("bsi", $null, $fileType, $userId);
                $stmtUpdate->send_long_data(0, $fileContent);
                $stmtUpdate->execute();

                if ($stmtUpdate->affected_rows > 0) {
                    echo "<script>
                            alert('profile picture is updated successfully.');
                            window.location.href = './Profile.php';
                        </script>";
                    exit();
                } else {
                    echo "<script>
                            alert('Failed to update profile picture.');
                            window.location.href = './Profile.php';
                        </script>";
                    exit();
                }

                $stmtUpdate->close();
            } else {
                // Insert a new profile picture
                $sqlInsert = "INSERT INTO user_account_db (ID, Avatar, AvatarType) VALUES (?, ?, ?)";
                $stmtInsert = $conn->prepare($sqlInsert);
                $stmtInsert->bind_param("isb", $userId, $null, $fileType);
                $stmtInsert->send_long_data(1, $fileContent);
                $stmtInsert->execute();

                if ($stmtInsert->affected_rows > 0) {
                    echo "<script>
                            alert('Photo is uploaded successfully.');
                            window.location.href = './Profile.php';
                        </script>";
                    exit();
                } else {
                    echo "<script>
                            alert('Failed to upload profile picture.');
                            window.location.href = './Profile.php';
                        </script>";
                    exit();
                }

                $stmtInsert->close();
            }

            $stmtCheck->close();
        } else {
            echo "Invalid file type or file too large.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }

    $conn->close();
}
