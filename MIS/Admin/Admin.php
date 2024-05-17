    <?php
    require '../Database/connection.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sidebar With Bootstrap</title>
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


        h2 {
            font-size: 50px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            margin-top: 20px;
        }



        .card {
            height: 130px;
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
            border-radius: 30px;
        }

        .p1 {
            font-size: 17px;
            font-weight: 800;
        }

        .num {
            font-size: 30px;
            font-weight: 600;
            margin-left: 6px;

        }

        h3 {
            font-size: 50px;
            color: white;
            margin-right: 33px;

        }

        .custom-bg-done {
            background-color: #00ac6a;

        }

        .custom-bg-on-going {
            background-color: #f4a000;
        }

        .custom-bg-pending {
            background-color: #e81500;
        }

        .custom-bg-feedback {
            background-color: #025feb;
        }

        .custom-bg-inquiry {
            background-color: #025feb;
        }

        .custom-bg-user {
            background-color: #ea6a47;
        }


        .col-md-6.mt-5 {
            background-color: white;
            padding: 20px;
            border-radius: 20px;
            font-weight: 700;
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
            
        }

        .progress-group {
            margin-top: 16px;
        }

        span.float-right {
            float: right;
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
                                        <a href="calendar.php" class="sidebar-link"><i class="fa-solid fa-user"></i>Calendar</a>
                                    </li>
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
                    <a href="../login.html" id="logout" class="sidebar-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </aside>
            <div class="main">
                <div class="dashboard">
                    <div class="container">
                        <h2>Dashboard</h2>
                        <div class="row">
                            <div class=" col-lg-4">
                                <div class="card custom-bg-done">
                                    <div class="card-body d-flex justify-content-between align-items-center ">
                                        <div>
                                            <p class="p1">DONE REQUEST</p>
                                            <span class="num" id="doneCount">
                                                <?php
                                                // Counting ongoing requests from multiple tables
                                                // Each SELECT statement counts ongoing requests from a specific table

                                                // Start the SQL query
                                                $sql = "SELECT SUM(total) AS total FROM (";

                                                // First SELECT statement for prof_room_request_form_db
                                                $sql .= "SELECT COUNT(*) AS total FROM prof_room_request_form_db WHERE Status = 'Done'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Second SELECT statement for service_request_db
                                                $sql .= "SELECT COUNT(*) AS total FROM service_request_db WHERE Status = 'Done'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Third SELECT statement for stud_room_request_form_db
                                                $sql .= "SELECT COUNT(*) AS total FROM stud_room_request_form_db WHERE Status = 'Done'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Fourth SELECT statement for equipment_request_prof
                                                $sql .= "SELECT COUNT(*) AS total FROM equipment_request_prof WHERE Status = 'Done'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Fifth SELECT statement for equipment_request_stud
                                                $sql .= "SELECT COUNT(*) AS total FROM equipment_request_stud WHERE Status = 'Done'";

                                                // End the SQL query
                                                $sql .= ") AS combined";

                                                // Execute the SQL query
                                                $result = $conn->query($sql);

                                                // Fetch the result
                                                $row = $result->fetch();

                                                echo $row['total']; // Accessing the count using the alias 'total'
                                                // Output the total count
                                                $totalDoneCount = $row['total']; // Assigning the total count to a variable

                                                // Function to calculate the percentage
                                                function calculatePercentage($count, $goal)
                                                {
                                                    return ($count / $goal) * 100;
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div>
                                            <h3><i class="fa-regular fa-square-check"></i></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-4">
                                <div class="card custom-bg-on-going">
                                    <div class="card-body d-flex justify-content-between align-items-center ">
                                        <div>
                                            <p class="p1">ON-GOING REQUEST</p>
                                            <span class="num" id="ongoingCount">
                                                <?php
                                                // Counting ongoing requests from multiple tables
                                                // Each SELECT statement counts ongoing requests from a specific table

                                                // Start the SQL query
                                                $sql = "SELECT SUM(total) AS total FROM (";

                                                // First SELECT statement for prof_room_request_form_db
                                                $sql .= "SELECT COUNT(*) AS total FROM prof_room_request_form_db WHERE Status = 'On-going'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Second SELECT statement for service_request_db
                                                $sql .= "SELECT COUNT(*) AS total FROM service_request_db WHERE Status = 'On-going'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Third SELECT statement for stud_room_request_form_db
                                                $sql .= "SELECT COUNT(*) AS total FROM stud_room_request_form_db WHERE Status = 'On-going'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Fourth SELECT statement for equipment_request_prof
                                                $sql .= "SELECT COUNT(*) AS total FROM equipment_request_prof WHERE Status = 'On-going'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Fifth SELECT statement for equipment_request_stud
                                                $sql .= "SELECT COUNT(*) AS total FROM equipment_request_stud WHERE Status = 'On-going'";

                                                // End the SQL query
                                                $sql .= ") AS combined";

                                                // Execute the SQL query
                                                $result = $conn->query($sql);

                                                // Fetch the result
                                                $row = $result->fetch();

                                                echo $row['total']; // Accessing the count using the alias 'total'

                                                // Output the total count
                                                $onGoingCount = $row['total']; // Assigning the total count to a variable

                                                // Function to calculate the percentage
                                                function calculatePercentage1($count, $goal)
                                                {
                                                    return ($count / $goal) * 100;
                                                }
                                                ?>

                                            </span>
                                        </div>
                                        <div>
                                            <h3><i class="fas fa-tasks"></i></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4">
                                <div class="card custom-bg-pending">
                                    <div class="card-body d-flex justify-content-between align-items-center ">
                                        <div>
                                            <p class="p1">PENDING REQUEST</p>
                                            <span class="num" id="pendingCount">
                                                <?php
                                                // Counting ongoing requests from multiple tables
                                                // Each SELECT statement counts ongoing requests from a specific table

                                                // Start the SQL query
                                                $sql = "SELECT SUM(total) AS total FROM (";

                                                // First SELECT statement for prof_room_request_form_db
                                                $sql .= "SELECT COUNT(*) AS total FROM prof_room_request_form_db WHERE Status = 'Pending'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Second SELECT statement for service_request_db
                                                $sql .= "SELECT COUNT(*) AS total FROM service_request_db WHERE Status = 'Pending'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Third SELECT statement for stud_room_request_form_db
                                                $sql .= "SELECT COUNT(*) AS total FROM stud_room_request_form_db WHERE Status = 'Pending'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Fourth SELECT statement for equipment_request_prof
                                                $sql .= "SELECT COUNT(*) AS total FROM equipment_request_prof WHERE Status = 'Pending'";
                                                $sql .= " UNION ALL "; // Combine results with the next SELECT statement

                                                // Fifth SELECT statement for equipment_request_stud
                                                $sql .= "SELECT COUNT(*) AS total FROM equipment_request_stud WHERE Status = 'Pending'";

                                                // End the SQL query
                                                $sql .= ") AS combined";

                                                // Execute the SQL query
                                                $result = $conn->query($sql);

                                                // Fetch the result
                                                $row = $result->fetch();
                                                echo $row['total']; // Accessing the count using the alias 'total'
                                                // Output the total count
                                                $pendingCount = $row['total']; // Assigning the total count to a variable

                                                // Function to calculate the percentage
                                                function calculatePercentage2($count, $goal)
                                                {
                                                    return ($count / $goal) * 100;
                                                }
                                                ?>

                                            </span>
                                        </div>
                                        <div>
                                            <h3><i class="fa-regular fa-comment"></i></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class=" col-lg-4 mt-5">
                                <div class="card custom-bg-feedback">
                                    <div class="card-body d-flex justify-content-between align-items-center ">
                                        <div>
                                            <p class="p1">FEEDBACK</p>
                                            <span class="num" id="pendingCount">
                                                <?php
                                                // Execute the SQL query to count the total number of records in the feedback_form_db table
                                                $sql = "SELECT COUNT(*) AS total FROM feedback_form_db";
                                                $result = $conn->query($sql);
                                                $row = $result->fetch();

                                                // Output the total count
                                                echo $row['total']; // Accessing the count using the alias 'total'

                                                // Extract the total count from the result
                                                $feedbackCount = $row['total'];
                                                // Function to calculate the percentage
                                                function calculatePercentage3($count, $goal)
                                                {
                                                    return ($count / $goal) * 100;
                                                }
                                                ?>




                                            </span>
                                        </div>
                                        <div>
                                            <h3><i class="fa-solid fa-message"></i></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-4 mt-5">
                                <div class="card custom-bg-inquiry">
                                    <div class="card-body d-flex justify-content-between align-items-center ">
                                        <div>
                                            <p class="p1">INQUIRY</p>
                                            <span class="num" id="pendingCount">
                                                <?php
                                                // Execute the SQL query to count the total number of records in the feedback_form_db table
                                                $sql = "SELECT COUNT(*) AS total FROM message_us_db";
                                                $result = $conn->query($sql);
                                                $row = $result->fetch();

                                                // Output the total count
                                                echo $row['total']; // Accessing the count using the alias 'total'

                                                // Extract the total count from the result
                                                $inquiryCount = $row['total'];
                                                // Function to calculate the percentage
                                                function calculatePercentage4($count, $goal)
                                                {
                                                    return ($count / $goal) * 100;
                                                }
                                                ?>

                                            </span>
                                        </div>
                                        <div>
                                            <h3><i class="fa-solid fa-message"></i></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4 mt-5">
                                <div class="card custom-bg-user">
                                    <div class="card-body d-flex justify-content-between align-items-center ">
                                        <div>
                                            <p class="p1">Student Assistance</p>
                                            <span class="num" id="pendingCount">
                                                <?php
                                                // Execute the SQL query to count the total number of records in the user_account_db table
                                                $sql = "SELECT COUNT(*) AS total FROM user_account_db WHERE Position = 'Owner' AND Status = 'Active'";
                                                $result = $conn->query($sql);
                                                $row = $result->fetch();

                                                // Check if the result is valid before accessing the 'total' key
                                                if ($row && isset($row['total'])) {
                                                    // Output the total count
                                                    echo $row['total'];

                                                    // Extract the total count from the result
                                                    $userCount = $row['total'];
                                                } else {
                                                    echo "No records found"; // or handle the case when no records are found
                                                }

                                                // Function to calculate the percentage
                                                function calculatePercentage5($count, $goal)
                                                {
                                                    return ($count / $goal) * 100;
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div>
                                            <h3><i class="fa-solid fa-users"></i></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HTML code to display progress bars -->
                        <div class="col-md-6 mt-5 mx-auto ">
    <p class=" text-center fa-2x">
                                <strong>Request Tracker</strong>
                            </p>

                            <div class="progress-group">
                                Done REQUEST
                                <span class="float-right"><b><?php echo $totalDoneCount; ?></b>/100</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: <?php echo calculatePercentage($totalDoneCount, 100); ?>%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                ON-GOING REQUEST
                                <span class="float-right"><b><?php echo $onGoingCount; ?></b>/100</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" style="width: <?php echo calculatePercentage1($onGoingCount, 100); ?>%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                PENDING REQUEST
                                <span class="float-right"><b><?php echo $pendingCount; ?></b>/100</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: <?php echo calculatePercentage2($pendingCount, 100); ?>%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                FEEDBACK
                                <span class="float-right"><b><?php echo $feedbackCount; ?></b>/100</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: <?php echo calculatePercentage3($feedbackCount, 100); ?>%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                INQUIRY
                                <span class="float-right"><b><?php echo $inquiryCount; ?></b>/100</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: <?php echo calculatePercentage4($inquiryCount, 100); ?>%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                Student Assistance
                                <span class="float-right"><b><?php echo $userCount; ?></b>/100</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: <?php echo calculatePercentage5($userCount, 100); ?>%"></div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        </div>
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

            // Function to fetch counts from the database using AJAX
            function fetchCountsFromDatabase() {
                return new Promise((resolve, reject) => {
                    fetch('http://localhost:3000/api/counts') // Update the URL with your actual API endpoint
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            resolve(data);
                        })
                        .catch(error => {
                            reject(error);
                        });
                });
            }
        </script>



    </body>

    </html>