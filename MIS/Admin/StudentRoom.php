<?php
include '../Database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-YQp1wFdsy1Z3dCU5ym8nfcfJWIPSK1rYBprYO8r00ELIOknvRr4aRKeqWSS6I6Zh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
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
        background-color: #ff4d00;
        position: sticky;
        top: -2px;
    }

    .table-responsive.m-2 {
        width: 99%;
        height: 100vh;

    }
    /* Adjust font size for table and columns */
.table,
.table th,
.table td {
    font-size: 14px; /* Adjust the font size as needed */
    text-align: center;
}

    /* Hide status and action columns when sidebar is expanded */
    .sidebar-expand .status-column,
    .sidebar-expand .action-column {
        display: none;
    }

    .dataTables_filter {
        margin-bottom: 20px;
    }

    .table {
        background-color: #ff4d00;
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
            <div class="table-responsive m-2">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="table">
                        <tr>
                            <th>No</th>
                            <th>Student Name</th>
                            <th>Student No.</th>
                            <th>Professor Name</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Date</th>
                            <th class="status-column">Status</th>
                            <th class="action-column">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            // Set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Prepare the SQL SELECT statement
                            $stmt = $conn->prepare("SELECT * FROM `stud_room_request_form_db`");

                            // Execute the statement
                            $stmt->execute();

                            // Fetch all the results
                            $client_count = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($client_count) {
                                $counter = 1;
                                // Iterate over each row
                                foreach ($client_count as $acc) {
                                    if ($acc['Status'] !== "Done" && $acc['Status'] !== "Denied") {
                                        echo "<tr>";
                                        // Output each column value of the row, including the arrow icon
                                        echo "<th scope='row'>" . $counter . "</th>";
                                        echo "<td>" . htmlspecialchars($acc['Student_Name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($acc['Student_Number']) . "</td>";
                                        echo "<td>" . htmlspecialchars($acc['Prof_name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($acc['Course']) . "</td>";
                                        echo "<td>" . htmlspecialchars($acc['Year']) . "</td>";
                                        echo "<td>" . htmlspecialchars($acc['Section']) . "</td>";
                                        echo "<td>" . htmlspecialchars($acc['Date']) . "</td>";
                                        echo "<td class='status-column'>" . htmlspecialchars($acc['Status']) . "</td>";
                                        if ($acc['Status'] === "On-going") {
                                            echo "<td class='action-column'>" .
                                                "<button class='btn btn-warning pending m-2' data-id='" . htmlspecialchars($acc['Id']) . "'><i class='bi bi-pause-fill'>Pending</i></button>" .
                                                "<button class='btn btn-success done m-2' data-id='" . htmlspecialchars($acc['Id']) . "'><i class='bi bi-check-square-fill'>Done</i></button>" .
                                                "</td>";
                                        } else if ($acc['Status'] === "Pending") {
                                            echo "<td class='action-column'>" .
                                                "<button class='btn btn-info on-going m-2' data-id='" . htmlspecialchars($acc['Id']) . "'><i class='bi bi-play-fill'>On-going</i></button>" .
                                                "<button class='btn btn-success done m-2' data-id='" . htmlspecialchars($acc['Id']) . "'><i class='bi bi-check-square-fill'>Done</i></button>" .
                                                "</td>";
                                        } else {
                                            echo "<td class='action-column'>" .
                                                "<button class='btn btn-success m-2 accept' data-id='" . htmlspecialchars($acc['Id']) . "' name='AcceptDenied'><i class='bi bi-check-square-fill'>Accept</i></button>" .
                                                "<button class='btn btn-danger denied' data-id='" . htmlspecialchars($acc['Id']) . "'><i class='bi bi-x-square-fill'>Denied</i></button>" .
                                                "</td>";
                                        }
                                        echo "</tr>";

                                        $counter++;
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='10'>No data found</td></tr>";
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


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthChange": false, // Hide the "Show [n] entries" dropdown
            });
        });
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
            document.querySelector(".main").classList.toggle("sidebar-expand");

            $(document).ready(function() {
                // Toggle visibility of action buttons and columns
                function toggleColumns() {
                    $('.status-column, .action-column').toggleClass('hidden');
                    table.columns([9, 10]).visible(!$('.status-column').hasClass('hidden'));
                    table.columns.adjust().draw(false);
                }

                // Click event for toggling columns
                $('.toggle-status-action').click(function() {
                    toggleColumns();
                });

            });
        });

        $(document).ready(function() {
            // AJAX request for 'On-going' status
            $('.accept, .on-going').click(function() {
                var id = $(this).data('id'); // Get the data-id attribute of the clicked button

                // Make an AJAX request to your server-side script
                $.ajax({
                    url: './Action.php', // The server-side script that handles the database update
                    type: 'POST',
                    data: {
                        id: id,
                        status: 'On-going'
                    }, // Send the ID and new status
                    success: function(response) {
                        // On success, update the Status cell of the corresponding row
                        $('button[data-id="' + id + '"]').closest('tr').find('td:eq(7)').text('On-going');
                        location.reload();
                    },
                    error: function() {
                        alert('Error updating status. Please try again.');
                    }
                });
            });

            $(document).ready(function() {
                // AJAX request for updating status to "Pending"
                $('.pending').click(function() {
                    var id = $(this).data('id'); // Get the data-id attribute of the clicked button

                    // Make an AJAX request to update the status
                    $.ajax({
                        url: './Action.php', // URL to the server-side script for updating status
                        type: 'POST',
                        data: {
                            id: id,
                            status: 'Pending'
                        }, // Send the ID and new status
                        success: function(response) {
                            // On success, update the UI or notify the user
                            //alert(response); // For demonstration, you can replace this with updating the UI
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle errors here
                        }
                    });
                });
            });

            // AJAX request for 'Done' status
            $(".done").click(function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "./Action.php",
                    type: "POST",
                    data: {
                        id: id,
                        status: "Done"
                    },
                    success: function(response) {
                        // Reload the page after updating status
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $(".denied").click(function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "./Action.php",
                    type: "POST",
                    data: {
                        id: id,
                        status: "Denied"
                    },
                    success: function(response) {
                        // Reload the page after updating status
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>


</body>
</html>