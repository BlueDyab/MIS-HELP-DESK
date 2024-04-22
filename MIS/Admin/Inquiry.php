<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry</title>
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
        }

        tr {
            border: 1px solid gray;
        }

        .th {
            text-align: center;
        }
        .table-responsive.m-2 {
        width: 99.3%;
            height: 100vh;

        }

        .header {
            position: sticky;
            top: -2px;
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


        
        <div class="table-responsive m-2">
                    <table class="table table-bordered">
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
    </table>
        </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
    });

    // Add event listener to handle clicks on the sidebar links
    document.querySelectorAll('.sidebar-link').forEach(link => {
        link.addEventListener('click', function (e) {
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