<?php
require '../Database/connection.php';
session_start();
if (!isset($_SESSION['Admin_ID'])) {
    $USER_ID = $_SESSION['Admin_ID'];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Prepare the SQL SELECT statement
    $stmt = $conn->prepare("SELECT `ID`, `Name` FROM `user_account_db` WHERE `ID` = :id");
    $stmt->bindParam(':id', $USER_ID);
    $stmt->execute();
    $acc = $stmt->fetch();

    if (!$acc['ID']) {
        header('location: ../login.html');
        exit;
    }
}
$USER_ID_PROFILE = $_SESSION['Admin_ID'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Prepare the SQL SELECT statement
$stmt = $conn->prepare("SELECT `Name` FROM `user_account_db` WHERE `ID` = :id");
$stmt->bindParam(':id', $USER_ID_PROFILE);
$stmt->execute();
$USER = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-YQp1wFdsy1Z3dCU5ym8nfcfJWIPSK1rYBprYO8r00ELIOknvRr4aRKeqWSS6I6Zh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css">
</head>
<style>
    .main {
        min-height: 100vh;
        width: 100%;
        overflow: hidden;
        transition: all 0.35s ease-in-out;
        background-color: #ffe5b5;
    }

    /*profile*/
    .card-header {
        background-color: #007bff;
        color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem 0.25rem 0 0;
    }

    .card-body {
        padding: 1.25rem;
    }

    .img-account-profile {
        width: 45%;
        height: 280px;

    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .font-italic {
        font-style: italic;
    }

    .text-muted {
        color: #6c757d;
    }

    i {
        width: 20px;
        text-align: center;
    }
</style>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <img src="getImage.php" alt="User Avatar" class="logo-img">
                </button>
                <div class="sidebar-logo">
                    <a href="Profile.php"><?php echo $USER['Name']; ?><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="Admin.php" id="profile" class="sidebar-link">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>DashBoard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fa-solid fa-code-pull-request"></i>
                        <span>Request</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="Service.php" id="service" class="sidebar-link"><i class="fa-solid fa-user"></i>Service</a>
                        </li>

                        <li class="sidebar-item">
                            <a href="Feedback.php" id="feedback" class="sidebar-link"><i class="fa-solid fa-comments"></i>Feedback</a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#equipmentDropdown" aria-expanded="false" aria-controls="equipmentDropdown">
                                <i class="fa-solid fa-wrench"></i>
                                <span>Equipment</span>
                            </a>
                            <ul id="equipmentDropdown" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="ProfessorEquipment.php" id="equipment" class="sidebar-link"><i class="fa-solid fa-chalkboard-user"></i>Professor</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="StudentEquipment.php" id="room" class="sidebar-link"><i class="fa-solid fa-user"></i>Student</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#roomDropdown" aria-expanded="false" aria-controls="roomDropdown">
                                <i class="fa-solid fa-desktop"></i>
                                <span>Room</span>
                            </a>
                            <ul id="roomDropdown" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="ProfessorRoom.php" id="room" class="sidebar-link"><i class="fa-solid fa-chalkboard-user"></i>Professor</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="StudentRoom.php" id="room" class="sidebar-link"><i class="fa-solid fa-user"></i>Student</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="Inquiry.php" id="inquiry" class="sidebar-link">
                        <i class="fa-solid fa-message"></i>
                        <span>Inquiry</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="Record.php" id="record" class="sidebar-link">
                        <i class="fa-solid fa-folder"></i>
                        <span>Record</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="User.php" id="account" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>User Account </span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="./Action.php" id="logout" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main">
            <div class="row mt-5 m-2">

                <!-- First row -->
                <div class=" col-md-6">
                    <!-- Profile -->
                    <div class="card mb-8 mb-xl-0">
                        <div class="card-header">Account</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image -->
                            <img class="img-account-profile rounded-circle mb-2" src="getImage.php" alt="">
                            <!-- Profile picture help block -->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button -->

                            <form action="upload_image.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="profile_picture" id="profile-picture-input" style="display: none;">
                                <label for="profile-picture-input" class="btn btn-primary">Upload New image</label>
                                <button type="submit" name="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Change Password Form -->
                    <div class="card">
                        <div class="card-header">
                            Account Details
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="User" class="form-label">Username</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="user">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fa-solid fa-user"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="currentPassword">
                                        <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="newPassword">
                                        <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirmPassword">
                                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="update_user">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <script src="./js/all.js"></script>
            <script>
                const hamBurger = document.querySelector(".toggle-btn");

                hamBurger.addEventListener("click", function() {
                    document.querySelector("#sidebar").classList.toggle("expand");
                });

                // Add event listener to handle clicks on the sidebar links
                document.querySelectorAll('.sidebar-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        // Check if the clicked element is the icon
                        if (e.target.classList.contains('fa-solid')) {
                            // Prevent the default behavior (expanding/collapsing the dropdown)
                            e.preventDefault();
                            // Toggle the expand class on the sidebar
                            document.querySelector("#sidebar").classList.toggle("expand");
                        }
                    });
                });

                document.getElementById('logout').addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default link behavior

                    // Create a form and append it to the body
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = './Action.php'; // The target PHP script for logout

                    var hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = 'logoutbtn';
                    hiddenField.value = 'true';
                    form.appendChild(hiddenField);

                    document.body.appendChild(form);
                    form.submit(); // Submit the form
                });

                $(document).ready(function() {
                    $.ajax({
                        url: 'getImage.php', // URL of the PHP script
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                // Set the src of img and display it
                                $('.logo-imig').attr('src', response.imagePath).show();
                            } else {
                                console.error('Failed to load image: ' + response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $(document).ready(function() {
                    $("form").submit(function(event) {
                        event.preventDefault(); // Prevent the default form submission

                        var formData = {
                            'currentPassword': $('input[name=currentPassword]').val(),
                            'newPassword': $('input[name=newPassword]').val(),
                            'confirmPassword': $('input[name=confirmPassword]').val()
                        };

                        $.ajax({
                            type: 'POST',
                            url: 'update_user.php', // Your PHP script
                            data: formData,
                            success: function(response) {
                                alert(response); // Alerts the response from the PHP script
                            }
                        });
                    });
                });
            </script>

</body>

</html>