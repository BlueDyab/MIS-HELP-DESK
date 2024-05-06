<?php
session_start();
require '../Database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-YQp1wFdsy1Z3dCU5ym8nfcfJWIPSK1rYBprYO8r00ELIOknvRr4aRKeqWSS6I6Zh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css">
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

    .table-responsive.m-2 {
        width: 99.3%;
        height: 100vh;

    }



    /* Hide sidebar when printing */
    @media print {
        #sidebar {
            display: none;
        }
    }

    /* Hide print button when printing */
    @media print {
        #printBtn {
            display: none;
        }
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
            <!-- Search input field -->
            <div class="container-fluid">
                <div class="row justify-content-end mt-2">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <form method="GET" action="Service.php">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search...">
                                <button class="btn btn-primary" id="searchButton" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="table-responsive m-2">
                <table class="table table-bordered table-striped text-center">
                    <!-- Table header -->
                    <thead class="header fixed-top">
                        <tr>
                            <th class="th" scope="col">No</th>
                            <th class="col-2" scope="col">Staff Name</th>
                            <th class="th col-1" scope="col">Department</th>
                            <th class="th col-1" scope="col">Detail</th>
                            <th class="th col-1" scope="col">Action</th>
                            <th class="th col-2" scope="col">Date</th>
                            <th class="th col-2" scope="col">Time</th>
                            <th class="th col-1" scope="col">Due Time</th>
                            <th class="th col-2" scope="col">Recommendation</th>
                            <th class="th col-1" scope="col">Status</th>
                            <th class="th col-1" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="data table-group-divider" id="searchResults">
                        <?php
                        try {
                            // Set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Initialize the search query
                            $search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';

                            // Prepare the SQL SELECT statement with the search condition
                            $stmt = $conn->prepare("SELECT * FROM `service_request_db` WHERE `Staff_Name` LIKE ? OR `Date` LIKE ? OR `Action_Taken` LIKE ? OR `Dept` LIKE ?");
                            $stmt->execute([$search, $search, $search, $search]);

                            // Fetch all the results
                            $client_count = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($client_count) {
                                // Initialize counter
                                $counter = 1;
                                // Iterate over each row
                                foreach ($client_count as $acc) {
                                    echo "<tr>";
                                    // Output each column value of the row
                                    echo "<th class='td' scope='col'>" . $counter . "</th>"; // Display the counter
                                    echo "<td class='td' style='display:none;'>" . $acc['Id'] . "</td>";
                                    echo "<td class='td'>" . $acc['Staff_Name'] . "</td>";
                                    echo "<td class='td'>" . $acc['Dept'] . "</td>";
                                    echo "<td class='td'>" . $acc['Details'] . "</td>";
                                    echo "<td class='td'>" . $acc['Action_Taken'] . "</td>";
                                    echo "<td class='td'>" . $acc['Date'] . "</td>";
                                    echo "<td class='td'>" . $acc['Time'] . "</td>";
                                    echo "<td class='td'>" . $acc['Due_Time'] . "</td>";
                                    echo "<td class='td'>" . $acc['Recommendation'] . "</td>";
                                    echo "<td class='td'>" . $acc['Status'] . "</td>";
                                    echo "<td class='td'>" . "<button class='btn btn-danger m-2 openFormBtnEdit' data-id='" . htmlspecialchars($acc['Id']) . "' name='AcceptDenied'><i class='fas fa-edit'>Accept</i></button>" . "<button class='btn btn-danger denied' data-id='" . htmlspecialchars($acc['Id']) . "'><i class='fas fa-trash'>Denied</button>" . "</td>";
                                    // Check if 'ID' key exists in the $acc array
                                    // if (array_key_exists('Id', $acc)) {
                                    //     // Output the button with 'ID' data attribute
                                    //     echo "<button class='btn btn-danger m-2 openFormBtnEdit' data-id='" . htmlspecialchars($acc['Id']) . "' name='editing'><i class='fas fa-edit'></i></button>";
                                    //     echo "<button class='btn btn-danger deleteButton' data-id='" . htmlspecialchars($acc['Id']) . "'><i class='fas fa-trash'></button>";
                                    // } else {
                                    //     // Output a message or placeholder if 'ID' key is not found
                                    //     echo "ID not available";


                                    // Increment the counter
                                    $counter++;
                                }
                            } else {
                                echo "<tr><td colspan='11'>No service request found.</td></tr>";
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </tbody>


            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            </script>

</body>

</html>