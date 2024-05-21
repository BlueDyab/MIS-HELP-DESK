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
    <title>Feedback</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
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
        background-color: #ffe5b5;
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
    margin-top: 20px;
    font-family: 'Merriweather', serif;

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
    font-size: 14px; /* Adjust the font size as needed */
    text-align: center;
}

.dataTables_filter {
        margin-bottom: 20px;
        margin-right: 30px;
       
    }
    .table{
        background-color: #ff4d00;
    }
    strong.mx-auto {
        margin-top: 20px;
    font-size: 50px;
    font-weight: 800;
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
                    <span>User Account</span>
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
        <strong class="mx-auto">FEEDBACK</strong>
    <div class="table-responsive m-2 mx-auto">
            <table id="example" class="table table-striped table-bordered ">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Feedback Details</th>
                        <th>Recommendation</th>
                    </tr>
                </thead>
                <tbody>
                <?php
try {
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL SELECT statement
    $stmt = $conn->prepare("SELECT * FROM `feedback_form_db`");

    // Execute the statement
    $stmt->execute();

    // Fetch all the results
    $client_count = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($client_count) {
        // Initialize counter
        $counter = 1;

        // Iterate over each row
        foreach ($client_count as $acc) {
            // Output each column value of the row
            echo "<tr>";
            echo "<th class='td' scope='col'>" . $counter . "</th>"; // Display the counter
            echo "<td class='td'>" . htmlspecialchars($acc['Name']) . "</td>";
            echo "<td class='td'>" . htmlspecialchars($acc['Dept']) . "</td>";
            echo "<td class='td'>" . htmlspecialchars($acc['Date']) . "</td>";
            echo "<td class='td'>" . htmlspecialchars($acc['Time']) . "</td>";
            echo "<td class='td'>" . htmlspecialchars($acc['Feedback']) . "</td>";
            echo "<td class='td'>" . htmlspecialchars($acc['Recomm']) . "</td>";
            echo "</tr>";

            // Increment the counter
            $counter++;
        }
    } else {
        echo "<tr><td colspan='7'>No feedback found.</td></tr>";
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
            "pageLength": 7 // Set the default length to 7 entries per page
        });
    });

    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
    });

    document.querySelectorAll('.sidebar-link').forEach(link => {
        link.addEventListener('click', function (e) {
            if (e.target.classList.contains('fa-solid')) {
                e.preventDefault();
                document.querySelector("#sidebar").classList.toggle("expand");
            }
        });
    });
</script>

</body>
</html>
