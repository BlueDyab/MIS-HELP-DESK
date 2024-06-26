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
    <title>User Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./css/overlayAdmin.css">
</head>

<style>
    .main {
        max-height: 100vh;
        width: 100%;
        overflow: hidden;
        transition: all 0.35s ease-in-out;
        background-color: #ffe5b5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: start;
    }

    .header {
        position: sticky;
        top: -2px;
    }

    .table-responsive.m-2 {
        width: 99%;
        height: 100vh;
        margin-top: 20px;

    }

    div#example_wrapper {
        background-color: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        border: 2px solid black;
    }

    /* Adjust font size for table and columns */
    .table,
    .table th,
    .table td {
        font-size: 14px;
        /* Adjust the font size as needed */
        text-align: center;
    }

    .dataTables_filter {
        margin-bottom: 20px;
        margin-right: 30px;

    }
    strong.mx-auto {
        margin-top: 20px;
        font-size: 50px;
        font-weight: 800;
    }

    .btn-primary {
        margin-right: 30px;
        width: 100px;
        height: 40px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 800;
    }

    .row {
        width: 100%;
    }

    /* Custom toast styling */
    .custom-toast {
        background-color: #a5dc86 !important;
    }

    strong {
        font-size: 50px;
        font-weight: 800;
        margin-left: 20px;
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
                <!-- <li class="sidebar-item">
                    <a href="Record.php" id="record" class="sidebar-link">
                        <i class="fa-solid fa-folder"></i>
                        <span>Record</span>
                    </a>
                </li> -->
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

            <div class="row">
                <div class="d-flex justify-content-between align-items-center">
                    <strong>ACCOUNT</strong>
                    <button class="btn btn-primary" id="openFormBtnAdd">ADD</button>
                </div>
            </div>

            <div class="table-responsive m-2">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Position</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
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
                                // Initialize counter
                                $counter = 1;

                                // Iterate over each row
                                foreach ($accounts as $acc) {
                                    echo "<tr>";
                                    // Output each column value of the row
                                    echo "<th>" . $counter . "</th>"; // Display the counter
                                    echo "<td>" . htmlspecialchars($acc['Name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($acc['Course']) . "</td>";
                                    echo "<th>" . htmlspecialchars($acc['Year']) . "</td>";
                                    echo "<td>" . htmlspecialchars($acc['Section']) . "</td>";
                                    echo "<td>" . htmlspecialchars($acc['Username']) . "</td>";
                                    // Be careful displaying passwords, even if hashed. Generally, this should not be done.
                                    echo "<td>" . htmlspecialchars($acc['Password']) . "</td>";
                                    echo "<td>" . htmlspecialchars($acc['Position']) . "</td>";
                                    echo "<td style='text-align: center; vertical-align: middle;'>
                                    <button class='btn btn-danger m-2 openFormBtnEdit' style='width: 30px; height: 30px; padding: 4px; font-size: 15px' data-id='" . htmlspecialchars($acc['ID']) . "' name='editing'><i class='fas fa-edit'></i></button>
                                    <button class='btn btn-danger deleteButton' style='width: 30px; height: 30px; padding: 5px; font-size:15px;' data-id='" . htmlspecialchars($acc['ID']) . "'><i class='fas fa-trash'></i></button>
                                  </td>";
                            echo "</tr>";
                            

                                    // Increment the counter
                                    $counter++;
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
    </div>




    <!-- Edit form-->
    <div class="overlay-form" id="overlayFormuser">
        <div class="form-container">
        <div class="card-header mt-2">
            <button class="close-icon" id="closeFormBtnEdit"><span>&#10006;</span></button><!-- Close icon -->
                <h2 class="text-center"> Account Form</h2>
        </div>

            <form action="" method="post">
                <div class=" mt-4 form-group">
                    <label for="name">Name:</label>
                    <input type="name" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-1 form-group">
                        <label for="course">Course:</label>
                        <select class="form-select" id="course" name="course" required>
                            <option value="">Select Year</option>
                            <option value="BSIS">BSIS</option>
                            <option value="BSEMC">BSEMC</option>
                            <option value="BSIT">BSIT</option>
                            <option value="BSCS">BSCS</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-1 form-group">
                        <label for="year">Year:</label>
                        <select class="form-select" id="year" name="year" required>
                            <option value="">Select Year</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                        </select>
                    </div>
                </div>
                    <div class="form-row">
                    <div class="col-md-6  mb-1 form-group">
                        <label for="section">Section:</label>
                        <select class="form-select" id="section" name="section" required>
                            <option value="">Select Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-1 form-group">
                        <label for="position">Position:</label>
                        <select class="form-select" id="position1" name="position" required>
                            <option value="">Select Position</option>
                            <option value="owner">Owner</option>
                            <option value="senior">Senior</option>
                            <option value="member">Member</option>
                        </select>
                    </div>
                    </div>
                
                <div class="mt-3 form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" name="username" required>
                </div>
                <div class=" mb-3 form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block" id="openFormBtnEdit" name="Edit_btn">update</button>
            </form>
        </div>
    </div>


    <!-- Add form -->

    <div class="overlay-form" id="overlayFormAdd">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <button class="close close-icon" id="closeFormBtnAdd"><span>&#10006;</span></button>
                    <h2 class="text-center">New Account</h2>
                </div>
                <div class="card-body">
                    <form action="adding.php" method="post">
                        <div class="mb-1">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <label for="course" class="form-label">Course:</label>
                                <select class="form-select" id="course" name="course" required>
                                    <option value="">Select Course</option>
                                    <option value="BSIS">BSIS</option>
                                    <option value="BSEMC">BSEMC</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSCS">BSCS</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="year" class="form-label">Year:</label>
                                <select class="form-select" id="year" name="year" required>
                                    <option value="">Select Year</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="section" class="form-label">Section:</label>
                            <select class="form-select" id="section" name="section" required>
                                <option value="">Select Section</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="position" class="form-label">Position:</label>
                            <select class="form-select" id="position" name="position" required>
                                <option value="">Select Position</option>
                                <option value="Coodinator">Coordinator</option>
                                <option value="senior SA">Senior SA</option>
                                <option value="Trainee SA">trainee SA</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-1">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary" id="openFormBtnAdd" name="Add_btn">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthChange": false, // Hide the "Show [n] entries" dropdown
                "pageLength": 4 // Set the default length to 7 entries per page
            });
        });
        const hamBurger = document.querySelector(".toggle-btn");
        const overlayFormEdit = document.getElementById("overlayFormuser");
        const closeFormBtnEdit = document.getElementById("closeFormBtnEdit");
        const openFormBtnEdit = document.querySelectorAll(".openFormBtnEdit");
        const overlayFormAdd = document.getElementById("overlayFormAdd");
        const closeFormBtnAdd = document.getElementById("closeFormBtnAdd");
        const openFormBtnAdd = document.getElementById("openFormBtnAdd");


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



        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".openFormBtnEdit");
            const editOverlay = document.getElementById("overlayFormuser");
            const editForm = editOverlay.querySelector("form");
            let currentId; // Variable to store the current ID

            editButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Get the row values
                    const row = button.closest("tr");
                    currentId = button.getAttribute('data-id');
                    const name = row.querySelectorAll("td")[0].textContent.trim();
                    const course = row.querySelectorAll("td")[1].textContent.trim();
                    const year = row.querySelectorAll("td")[2].textContent.trim();
                    const section = row.querySelectorAll("td")[3].textContent.trim();
                    const username = row.querySelectorAll("td")[4].textContent.trim();
                    const password = row.querySelectorAll("td")[5].textContent.trim();
                    const position = row.querySelectorAll("td")[6].textContent.trim();

                    // Populate the edit form with the fetched values
                    editForm.querySelector("#name").value = name;
                    editForm.querySelector("#course").value = course;
                    editForm.querySelector("#year").value = year;
                    editForm.querySelector("#section").value = section;
                    editForm.querySelector("#username").value = username;
                    editForm.querySelector("#password").value = password;
                    editForm.querySelector("#position1").value = position;

                    // Show the edit overlay
                    editOverlay.style.display = "flex";
                });
            });

            // When update button is clicked
            editForm.addEventListener("submit", function(event) {
                event.preventDefault();

                // Show confirmation dialog using SweetAlert2
                Swal.fire({
                    title: "Do you want to save the changes?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Save",
                    denyButtonText: `Don't save`
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Get the modified values
                        const newid = currentId;
                        const newName = editForm.querySelector("#name").value;
                        const newCourse = editForm.querySelector("#course").value;
                        const newYear = editForm.querySelector("#year").value;
                        const newSection = editForm.querySelector("#section").value;
                        const newUsername = editForm.querySelector("#username").value;
                        const newPassword = editForm.querySelector("#password").value;
                        const newPosition = editForm.querySelector("#position1").value;

                        // Send an AJAX request to update the database
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "update_data.php");
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Show success toast
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    iconColor: 'white', // Icon color
                                    customClass: {
                                        popup: 'custom-toast',
                                    },
                                    didClose: () => {
                                        // Reload the page or update the UI as needed

                                        // editOverlay.style.display = "none";
                                        location.reload(); // Reload the page to reflect the changes

                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: "Updated successfully"

                                });
                            } else {
                                // Error handling
                                console.error("Error updating data: " + xhr.statusText);
                            }
                        };
                        xhr.onerror = function() {
                            console.error("Request failed");
                        };
                        xhr.send(`id=${newid}&name=${newName}&course=${newCourse}&year=${newYear}&section=${newSection}&username=${newUsername}&password=${newPassword}&position=${newPosition}`);
                    } else if (result.isDenied) {
                        // Handle case where changes are not saved
                        console.log("Changes are not saved");
                    }
                });
            });
        });




        closeFormBtnEdit.addEventListener("click", function() {
            overlayFormEdit.style.display = "none";

            // Send an AJAX request to clear the session variable
            const xhr = new XMLHttpRequest();
            xhr.open('POST', './clear_session.php'); // Assuming the PHP script is named clear_session.php
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Session variable cleared successfully
                    console.log('Session variable cleared');
                } else {
                    // Error handling
                    console.error('Error clearing session variable');
                }
            };
            xhr.send(); // Send the request without any data
        });

        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll(".deleteButton");

            deleteButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const id = this.getAttribute('data-id');

                    // Show the confirmation modal using SweetAlert
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send an AJAX request to delete_data.php
                            const xhr = new XMLHttpRequest();
                            xhr.open("POST", "delete_data.php");
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    // Row deleted successfully

                                    // Show success toast
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                        iconColor: 'white', // Icon color
                                        customClass: {
                                            popup: 'custom-toast',

                                        },
                                        didClose: () => {
                                            // Reload the page or update the UI as needed
                                            location.reload(); // Reload the page to reflect the changes
                                        }
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: "Deleted successfully"
                                    });

                                } else {
                                    // Error handling
                                    console.error("Error deleting row");
                                }
                            };
                            xhr.send(`id=${id}`);
                        }
                    });
                });
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

        openFormBtnAdd.addEventListener("click", function() {
            overlayFormAdd.style.display = "flex";
        });

        closeFormBtnAdd.addEventListener("click", function() {
            overlayFormAdd.style.display = "none";
        });
    </script>
</body>

</html>