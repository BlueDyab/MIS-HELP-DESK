<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

// Include database connection code
include '../Database/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $replyMessage = $_POST['replyMessage'];

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'mishelpdesk2024@gmail.com';
        $mail->Password = 'xgdo zdau bkbe nlwl';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('mishelpdesk2024@gmail.com', 'MIS HELP DESK');
        $mail->addAddress($email);
        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Reply to Message';
        $mail->Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Reply to Message</title>
            <style>
                /* Add your CSS styles here */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 10px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    color: #333;
                }
                p {
                    color: #555;
                }
                /* Define styles for table */
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                th, td {
                    padding: 10px;
                    border-bottom: 1px solid #ddd;
                }
                th {
                    background-color: #f2f2f2;
                    font-weight: bold;
                    text-align: left;
                }
                /* Define badge styles */
                .badge {
                    display: inline-block;
                    padding: 5px 10px;
                    border-radius: 4px;
                    font-size: 14px;
                    font-weight: bold;
                }
                .badge.pending {
                    background-color: yellow;
                    color: black;
                }
                .badge.replied {
                    background-color: blue;
                    color: white;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Reply to Message</h1>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Your Reply:</strong></p>
                <p>$replyMessage</p>
            </div>
        </body>
        </html>
        ";
$mail->Body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Reply to Message</title>
        <style>
            /* Add your CSS styles here */
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333;
            }
            p {
                color: #555;
                margin-bottom: 10px;
            }
            /* Define styles for table */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
                font-weight: bold;
                text-align: left;
            }
            /* Define badge styles */
            .badge {
                display: inline-block;
                padding: 5px 10px;
                border-radius: 4px;
                font-size: 14px;
                font-weight: bold;
            }
            .badge.pending {
                background-color: yellow;
                color: black;
            }
            .badge.replied {
                background-color: blue;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Reply to Message</h1>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Your Reply:</strong></p>
            <p>$replyMessage</p>
            <p>Thank you for contacting us. We will get back to you as soon as possible.</p>
        </div>
    </body>
    </html>
";

    
        // Send email
        $mail->send();
        
        

        $mail->send();

        // Update status in the database
        $updateQuery = "UPDATE message_us_db SET status = 1 WHERE Email = :email";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo 'Your reply has been sent successfully.';
    } catch (Exception $e) {
        echo 'Sorry, there was an error sending your reply: ', $mail->ErrorInfo;
    }
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: index.php"); // Replace with your form page URL
    exit;
}

// // Close the database connection
// mysqli_close($conn);
?>
