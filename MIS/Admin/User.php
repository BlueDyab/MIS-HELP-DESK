
    <?php
    session_start();
    require '../Database/connection.php';
    //include './set_session.php';
    // Check if the session variable is set, otherwise initialize it
    if (!isset($_SESSION['editButtonClickedId'])) {
        $_SESSION['editButtonClickedId'] = ''; // You can set it to a default value, for example, an empty string
    }
    ?>
      <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Account</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-YQp1wFdsy1Z3dCU5ym8nfcfJWIPSK1rYBprYO8r00ELIOknvRr4aRKeqWSS6I6Zh" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="stylesheet" href="./css/overlayAdmin.css">
    </head>

    <style>
        .main {
            max-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
            background-color: #e2e3dc;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: start;
        }

        .header {
            background-color: #ff4d00;
        }

        tr {
            border: 1px solid black;
        }

        .th {
            text-align: center;
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
            justify-content: flex-start;
            align-items: center;
        }

        .btn-primary {
            margin-right: 30px;
            width: 100px;
            height: 40px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 800;
        }

        .btn-danger {
            border-radius: 10px;
            width: 100px;
        }

        .data {
            min-height: 500px;
            width: 100%;
        }

        .td {
            text-align: center;
        }

        td.text-center {
            padding: 0;
        }

        td.td {
            padding: 11px;
        }

        th.td {
            padding: 11px;
        }

        td.tf {
            padding: 11px;
        }

        .table-responsive.m-2 {
            width: 99%;
            height: 100vh;

        }

        .header {
            position: sticky;
        }

        .btn-danger {
            width: 60px;
            height: 35px;
            padding: 0;
        }
    </style>

    <body>

    <div class="wrapper">
<aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                <img src="../image/macaraeg.png" alt="Company Logo" class="logo-imig">
                </button>
                <div class="sidebar-logo">
                    <a href="Profile.php">User Account<i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="Admin.php"  id="profile" class="sidebar-link">
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
                            <a href="Feedback.php"  id="feedback" class="sidebar-link"><i class="fa-solid fa-comments"></i>Feedback</a>
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
                        <span>User Account  </span>
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

                <div class="Adding m-2">
                    <button class="btn btn-primary " id="openFormBtnAdd">ADD</button>
                </div>

                <div class="table-responsive m-2">
                    <table class="table table-striped">
                        <thead class="header fixed-top">
                            <tr>
                                <th class="th" scope="col">Id</th>
                                <th class="col-2" scope="col">Name</th>
                                <th class="th col-1" scope="col">Course</th>
                                <th class="th col-1" scope="col">Year</th>
                                <th class="th col-1" scope="col">Section</th>
                                <th class="th col-2" scope="col">Username</th>
                                <th class="th col-2" scope="col">Password</th>
                                <th class="th col-1" scope="col">Position</th>
                                <th class="th col-2" scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody class="data table-group-divider">
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
                                        echo "<th class='td' scope='col'>" . $counter . "</th>"; // Display the counter
                                        echo "<td class='tf'>" . htmlspecialchars($acc['Name']) . "</td>";
                                        echo "<td class='td'>" . htmlspecialchars($acc['Course']) . "</td>";
                                        echo "<td class='td'>" . htmlspecialchars($acc['Year']) . "</td>";
                                        echo "<td class='td'>" . htmlspecialchars($acc['Section']) . "</td>";
                                        echo "<td class='td'>" . htmlspecialchars($acc['Username']) . "</td>";
                                        // Be careful displaying passwords, even if hashed. Generally, this should not be done.
                                        echo "<td class='td password'>" . htmlspecialchars($acc['Password']) . "</td>";
                                        echo "<td class='td'>" . htmlspecialchars($acc['Position']) . "</td>";
                                        echo "<td class='text-center'><button class='btn btn-danger m-2 openFormBtnEdit' data-id='" . htmlspecialchars($acc['ID']) . "' name='editing'><i class='fas fa-edit'></i></button><button class='btn btn-danger deleteButton' data-id='" . htmlspecialchars($acc['ID']) . "'><i class='fas fa-trash'></button></td>";
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




                <!-- Edit form-->
                <div class="overlay-form" id="overlayFormuser">
                    <div class="form-container">
                        <?php
                        $editButtonClickedId = $_SESSION['editButtonClickedId'];
                        echo $editButtonClickedId;
                        ?>
                        <button class="close-icon" id="closeFormBtnEdit"><span>&#10006;</span>
                        </button><!-- Close icon -->

                        <div class="form-logo">
                            <h2> Account Form</h2>
                        </div>

                        <form action="" method="post">
                            <div class=" mb-1 form-group">
                                <label for="name">Name:</label>
                                <input type="name" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-1 form-group">
                                    <label for="course">Course:</label>
                                    <select class="form-select" id="course" name="course" required>
                                        <option value="">Select Year</option>
                                        <option value="BSIS">BSIS</option>
                                        <option value="BSEMC">BSEMC</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSCS">BSCS</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-1 form-group">
                                    <label for="year">Year:</label>
                                    <select class="form-select" id="year" name="year" required>
                                        <option value="">Select Year</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                    </select>
                                </div>
                                <div class="col-md-3  mb-1 form-group">
                                    <label for="section">Section:</label>
                                    <select class="form-select" id="section" name="section" required>
                                        <option value="">Select Section</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-1 form-group">
                                    <label for="position">Position:</label>
                                    <select class="form-select" id="position1" name="position" required>
                                        <option value="">Select Position</option>
                                        <option value="owner">Owner</option>
                                        <option value="senior">Senior</option>
                                        <option value="member">Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" mb-1 form-group">
                                <label for="username">Username</label>
                                <input type="username" class="form-control" id="username" name="username" required>
                            </div>
                            <div class=" mb-1 form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary" id="openFormBtnEdit" name="Edit_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">update</button>
                        </form>
                    </div>
                </div>

                <!-- Modal Confirmation -->
                <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to change?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="confirmUpdateBtn">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal Confirmation detelet -->
                <div class="modal fade" id="exampleModal1" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Delete </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to Delete?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="confirmUpdateDeleteBtn">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add form -->

                <div class="overlay-form" id="overlayFormAdd">
                    <div class="form-container">
                        <button class="close-icon" id="closeFormBtnAdd"><span>&#10006;</span>
                        </button><!-- Close icon -->
                        <div class="form-logo">
                            <h2> Add Form</h2>
                        </div>
                        <form action="adding.php" method="post">
                            <div class=" mb-1 form-group">
                                <label for="name">Name:</label>
                                <input type="name" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-1 form-group">
                                    <label for="ccourse">Course:</label>
                                    <select class="form-select" id="course" name="course" required>
                                        <option value="">Select Year</option>
                                        <option value="BSIS">BSIS</option>
                                        <option value="BSEMC">BSEMC</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSCS">BSCS</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-1 form-group">
                                    <label for="year">Year:</label>
                                    <select class="form-select" id="year" name="year" required>
                                        <option value="">Select Year</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                    </select>
                                </div>
                                <div class="col-md-3  mb-1 form-group">
                                    <label for="section">Section:</label>
                                    <select class="form-select" id="section" name="section" required>
                                        <option value="">Select Section</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-1 form-group">
                                    <label for="position">Position:</label>
                                    <select class="form-select" id="position1" name="position" required>
                                        <option value="">Select Position</option>
                                        <option value="owner">Owner</option>
                                        <option value="senior">Senior</option>
                                        <option value="member">Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" mb-1 form-group">
                                <label for="username">Username</label>
                                <input type="username" class="form-control" id="usernameA" name="username" required>
                            </div>
                            <div class=" mb-1 form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="passwordA" name="password" required>
                            </div>

                            <button type="button " class="btn btn-primary" id="openFormBtnAdd" name="Add_btn">Add</button>
                        </form>
                    </div>
                </div>
            </div>


            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <script>
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

                document.addEventListener("DOMContentLoaded", function() {
                    const editButtons = document.querySelectorAll(".openFormBtnEdit");
                    const editOverlay = document.getElementById("overlayFormuser");
                    const editForm = editOverlay.querySelector("form");

                    editButtons.forEach(function(button) {
                        button.addEventListener("click", function() {
                            // Get the row values
                            const row = button.closest("tr");
                            const id = row.querySelector(".td").textContent.trim();
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

                            // When update button is clicked
                            editForm.addEventListener("submit", function(event) {
                                event.preventDefault();
                                // Show the confirmation modal
                                const exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                                exampleModal.show();

                                // Handle confirm update button click
                                const confirmUpdateBtn = document.getElementById("confirmUpdateBtn");
                                confirmUpdateBtn.addEventListener("click", function() {
                                    // Get the modified values
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
                                            // Database updated successfully
                                            console.log("Data updated successfully");
                                            // Close the edit overlay
                                            editOverlay.style.display = "none";
                                            // Close the modal
                                            exampleModal.hide();
                                            // Refresh the page
                                            location.reload();
                                        } else {
                                            // Error handling
                                            console.error("Error updating data");
                                        }
                                    };
                                    xhr.send(`id=${id}&name=${newName}&course=${newCourse}&year=${newYear}&section=${newSection}&username=${newUsername}&password=${newPassword}&position=${newPosition}`);
                                });
                            });
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

                openFormBtnAdd.addEventListener("click", function() {
                    overlayFormAdd.style.display = "flex";
                });

                closeFormBtnAdd.addEventListener("click", function() {
                    overlayFormAdd.style.display = "none";
                });

                document.addEventListener("DOMContentLoaded", function() {
                    const deleteButtons = document.querySelectorAll(".deleteButton");

                    deleteButtons.forEach(function(button) {
                        button.addEventListener("click", function() {
                            const id = this.getAttribute('data-id');

                            // Show the confirmation modal
                            const exampleModal1 = new bootstrap.Modal(document.getElementById('exampleModal1'));
                            exampleModal1.show();

                            // Handle confirm delete button click
                            const confirmDeleteBtn = document.getElementById("confirmUpdateDeleteBtn");
                            confirmDeleteBtn.addEventListener("click", function() {
                                // Send an AJAX request to delete_data.php
                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "delete_data.php");
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        // Row deleted successfully
                                        console.log("Row deleted successfully");
                                        // Reload the page or update the UI as needed
                                        location.reload(); // Reload the page to reflect the changes
                                    } else {
                                        // Error handling
                                        console.error("Error deleting row");
                                    }
                                };
                                xhr.send(`id=${id}`);

                                // Close the modal after deletion
                                exampleModal1.hide();
                            });
                        });
                    });
                });
            </script>
    </body>

    </html>