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
    .table{
        background-color: #ff4d00;
    }

/* Style the buttons inside the table cells */


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
                            <th>No </th>
                            <th>Staff Name</th>
                            <th>Department</th>
                            <th>Detail</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Due time</th>
                            <th>Recommendation</th>
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
    $stmt = $conn->prepare("SELECT * FROM `service_request_db`");

    // Execute the statement
    $stmt->execute();

                            // Fetch all the results
                            $client_count = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($client_count) {
                                // Initialize counter
                                $counter = 1;
                                // Iterate over each row
                                foreach ($client_count as $data) {
                                    if ($data['Status'] !== "Done" && $data['Status'] !== "Denied"){
                                        echo "<tr>";
                                        // Output each column value of the row
                                        echo "<th class='td' scope='col'>" . $counter . "</th>";
                                        echo "<td class='td'>" . $data['Staff_Name'] . "</td>";
                                        echo "<td class='td'>" . $data['Dept'] . "</td>";
                                        echo "<td class='td'>" . $data['Details'] . "</td>";
                                        echo "<td class='td'>" . $data['Action_Taken'] . "</td>";
                                        echo "<td class='td'>" . $data['Date'] . "</td>";
                                        echo "<td class='td'>" . $data['Time'] . "</td>";
                                        echo "<td class='td'>" . $data['Due_Time'] . "</td>";
                                        echo "<td class='td'>" . $data['Recommendation'] . "</td>";
                                        echo "<td class='status-column'>" . $data['Status'] . "</td>";
                                        if ($data['Status'] === "On-going") {
                                            echo "<td class='action-column'>" . 
                                                 "<button class='btn btn-warning pending  m-2 mx-auto' data-id='" . htmlspecialchars($data['Id']) . "'><i class='bi bi-pause-fill'>Pending</i></button>" .
                                                 "<button class='btn btn-success done ' data-id='" . htmlspecialchars($data['Id']) . "'><i class='bi bi-check-square-fill'>Done</i></button>" .
                                                 "</td>";
                                        } else if ($data['Status'] === "Pending") {
                                            echo "<td class='action-column'>" . 
                                                 "<button class='btn btn-info on-going m-2 mx-auto' data-id='" . htmlspecialchars($data['Id']) . "'><i class='bi bi-play-fill'>On-going</i></button>" .
                                                 "<button class='btn btn-success done' data-id='" . htmlspecialchars($data['Id']) . "'><i class='bi bi-check-square-fill'>Done</i></button>" .
                                                 "</td>";
                                        } else {
                                            echo "<td class='action-column'>" . 
                                                 "<button class='btn btn-success m-2 mx-auto accept' data-id='" . htmlspecialchars($data['Id']) . "' name='AcceptDenied'><i class='bi bi-check-square-fill'>Accept</i></button>" . 
                                                 "<button class='btn btn-danger denied' data-id='" . htmlspecialchars($data['Id']) . "'><i class='bi bi-x-square-fill'>Denied</i></button>" . 
                                                 "</td>";
                                        }
                                        echo "</tr>";
                                        
                                        // Increment the counter
                                        $counter++;
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='11'>No service request found.</td></tr>";
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

    // Toggle visibility of action buttons and columns
    function toggleColumns() {
        $('.status-column, .action-column').toggleClass('hidden');
        table.columns([9, 10]).visible(!$('.status-column').hasClass('hidden'));
        table.columns.adjust().draw(false);
    }

    // If sidebar is expanded, show the status and action elements
    if (document.querySelector("#sidebar").classList.contains("expand")) {
        toggleColumns();
    }
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
            // Toggle the sidebar-expand class on the main element
            document.querySelector(".main").classList.toggle("sidebar-expand");
            // Toggle visibility of status and action elements
            toggleColumns();
        }
    });
});



       $(document).ready(function() {
                    // AJAX request for 'On-going' status
                    $('.accept, .on-going').click(function() {
                        var id = $(this).data('id'); // Get the data-id attribute of the clicked button

                        // Make an AJAX request to your server-side script
                        $.ajax({
                            url: '../Admin/Action.php', // The server-side script that handles the database update
                            type: 'POST',
                            data: { id: id, status: 'On-going' }, // Send the ID and new status
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
                                data: { id: id, status: 'Pending' }, // Send the ID and new status
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
                            data: { id: id, status: "Done" },
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
                            data: { id: id, status: "Denied" },
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
       
    </script>
           

</body>

</html>