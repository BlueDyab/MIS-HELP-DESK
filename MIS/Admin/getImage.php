<!-- <?php
// header('Content-Type: application/json');
// require './connection.php';
// session_start();

// if (isset($_SESSION['Admin_ID'])) {
//     $USER_ID = $_SESSION['Admin_ID'];
//     try {
//         // Create a PDO instance
//         $pdo = new PDO($dsn, $user, $password);
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         // Prepare and execute query
//         $stmt = $pdo->prepare("SELECT Avatar FROM user_account_db WHERE ID = :id");
//         $stmt->bindParam(':id', $USER_ID);  // Ensure $userId is defined or fetched appropriately
//         $stmt->execute();

//         // Fetch the result
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);

//         if ($result && !empty($result['Avatar'])) {
//             // Send back the image path
//             echo json_encode([
//                 'status' => 'success',
//                 'imagePath' => $result['Avatar']
//             ]);
//         } else {
//             // Image path not found
//             echo json_encode([
//                 'status' => 'error',
//                 'message' => 'No image found for the specified user.'
//             ]);
//         }
//     } catch (PDOException $e) {
//         // Handle any errors
//         echo json_encode([
//             'status' => 'error',
//             'message' => $e->getMessage()
//         ]);
//     }
} -->
