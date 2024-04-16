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
                        <a href="Equipment.php"  id="equipment" class="sidebar-link"><i class="fa-solid fa-wrench"></i>Equipment</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Feedback.php"  id="feedback" class="sidebar-link"><i class="fa-solid fa-comments"></i>Feedback</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Room.php"  id="room" class="sidebar-link"><i class="fa-solid fa-desktop"></i>Room</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="Inquiry.html" id="inquiry" class="sidebar-link">
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
            </table>
        </div>
        <!-- Add Print Button -->
        <button id="printBtn" class="btn btn-primary">Print Table</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="extensions/print/bootstrap-table-print.js"></script>
<script>
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function() {
        document.querySelector("#sidebar").classList.toggle("expand");
    });

    // Adding the printPageBuilder function
    $.extend($.fn.bootstrapTable.defaults, {
        printPageBuilder: function(table, styles) {
            return `
                <html>
                <head>
                ${styles}
                <style type="text/css" media="print">
                @page {
                size: auto;
                margin: 25px 0 25px 0;
                }
                </style>
                <style type="text/css" media="all">
                table {
                border-collapse: collapse;
                font-size: 12px;
                }
                table, th, td {
                border: 1px solid grey;
                }
                th, td {
                text-align: center;
                vertical-align: middle;
                }
                p {
                font-weight: bold;
                margin-left:20px;
                }
                table {
                width: 94%;
                margin-left: 3%;
                margin-right: 3%;
                }
                div.bs-table-print {
                text-align: center;
                }
                </style>
                </head>
                <title>Print Table</title>
                <body>
                <p>Printed on: ${new Date()} </p>
                <div class="bs-table-print">${table}</div>
                </body>
                </html>
            `;
        }
    });

    // Function to print the table
    document.getElementById('printBtn').addEventListener('click', function() {
        $('.table').bootstrapTable('print');
    });
</script>
</body>
</html>
