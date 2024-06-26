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
$stmt = $conn->prepare("SELECT `Name`, `Avatar` FROM `user_account_db` WHERE `ID` = :id");
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
    <title>Record</title>
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
        background-color: #e2e3dc;
    }

    .header {
        background-color: gray;
        position: sticky;
        top: -2px;
    }

    tr {
        font-size: 15px;
    }

    .th {
        text-align: center;
        color: white;

    }

    .password {
        background: transparent;
        border: none;
        outline: none;
    }

    .Adding {
        width: 99.3%;
        height: 50px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .btn-primary {
        margin-right: 30px;
        width: 100px;
        height: 40px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 800;
        float: right;
    }

    .btn-danger {
        border-radius: 10px;
        width: 100px;
    }

    .data {
        overflow: auto;
        min-height: 500px;
        width: 100%;
    }

    .td {
        text-align: center;
    }


    .table {
        width: 99.3%;
        height: 100%;

    }

    #th3 {
        font-size: 15px;
    }

    .header {
        position: sticky;
    }

    @media print {

        /* Hide sidebar */
        #sidebar {
            display: none;
        }

        title {
            font-size: 20px;
            font-weight: 800;
            text-align: center;
        }

        /* Hide the toggle button */
        .btn-primary {
            display: none;
        }

        /* Make the table header sticky */
        .header {
            position: static !important;
        }

        /* Adjust table styles for printing */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .th,
        .td {
            border: 3px solid #000;
            /* Add borders to table cells */
            padding: 8px;
            /* Add padding to table cells */
        }

        .th {
            background-color: #f2f2f2;
            /* Add background color to table header */
            font-size: 13px;
            font-weight: 800;
            text-align: center;
        }

        .data {
            overflow: visible !important;
            /* Ensure all table data is visible */
            min-height: auto !important;
            /* Remove the min-height property */
        }

        #th2 {
            display: none;
        }

        #th3 {
            font-size: 13px;
            font-weight: 800;
        }

        .table-responsive {
            overflow: hidden;
            width: 95%;
        }

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
                <!-- <li class="sidebar-item">
                    <a href="User.php" id="account" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>User Account </span>
                    </a>
                </li> -->
                <li class="sidebar-item">
                    <a href="" id="account" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>User Account </span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../login.html" id="logout" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main">
            <div class="table table-responsive m-2">
                <table class="table table-bordered">
                    <button class="btn btn-primary" onclick="window.print()">Print</button>
                    <thead class="header fixed-top">
                        <tr>
                            <th class="th" scope="col">Id</th>
                            <th id="th3" scope="col">Staff Name</th>
                            <th class="th" scope="col">Date</th>
                            <th class="th" scope="col">Time</th>
                            <th class="th" scope="col">Due Time</th>
                            <th class="th" scope="col">Department</th>
                            <th class="th" scope="col">Action Taken</th>
                            <th class="th" scope="col">Details</th>
                            <th class="th" scope="col">Recommendation</th>
                            <th class="th" id="th2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="data">
                        <?php
                        try {
                            // Set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Prepare the SQL SELECT statement
                            $stmt = $conn->prepare("SELECT * FROM `user_account_db`");
                            $stmt->execute();

                            // Fetch all the results
                            $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($accounts) {
                                // Iterate over each row
                                foreach ($accounts as $acc) {
                                    echo "<tr>";
                                    // Output each column value of the row
                                    echo "<th class='td' scope='col'>" . htmlspecialchars($acc['ID']) . "</th>"; // Assuming ID is your primary key and thus unique
                                    echo "<td>" . htmlspecialchars($acc['Name']) . "</td>";
                                    echo "<td class='td'>" . htmlspecialchars($acc['Course']) . "</td>";
                                    echo "<td class='td'>" . htmlspecialchars($acc['Year']) . "</td>";
                                    echo "<td class='td'>" . htmlspecialchars($acc['Section']) . "</td>";
                                    echo "<td class='td'>" . htmlspecialchars($acc['Username']) . "</td>";
                                    // Be careful displaying passwords, even if hashed. Generally, this should not be done.
                                    echo "<td class='td'>" . htmlspecialchars($acc['Password']) . "</td>";
                                    echo "<td class='td'>" . htmlspecialchars($acc['Position']) . "</td>";
                                    echo "<td class='text-center'><button class='btn btn-danger openFormBtnEdit' m-1'>Edit</button> <button class='btn btn-danger'>Delete</button></td>";
                                    echo "</tr>";
                                }
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
        </script>


<script>

            // validation for the PIN
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('account').addEventListener('click', function () {
        Swal.fire({
            title: 'Enter PIN',
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: (pin) => {
                return new Promise((resolve, reject) => {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../Database/validation_pin.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            console.log('Server response:', response);
                            if (response.valid) {
                                resolve(); // Resolve the promise if the PIN is valid
                            } else {
                                reject('Invalid PIN! Please try again.'); // Reject with an error message if the PIN is invalid
                            }
                        }
                    };
                    xhr.onerror = function () {
                        console.error('Request error occurred');
                        reject('Error occurred while validating PIN. Please try again.'); // Reject with an error message if there's an error
                    };
                    xhr.send('pin=' + encodeURIComponent(pin));
                });
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'PIN Submitted Successfully!',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                window.location.href = "User.php"; // Redirect immediately after PIN is confirmed
            }
        }).catch((error) => {
            Swal.showValidationMessage(error); // Show the validation error message
        });
    });
});


</script>







</html>