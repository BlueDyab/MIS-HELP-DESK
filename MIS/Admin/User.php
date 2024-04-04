    <?php
    require '../Database/connection.php';
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
            min-height: 100vh;
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

        .header {
            position: sticky;
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
                            <a href="Feedback.php"  id="feedback"class="sidebar-link"><i class="fa-solid fa-comments"></i>Feedback</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="Room.php"  id="feedback"class="sidebar-link"><i class="fa-solid fa-comments"></i>Feedback</a>
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
                
                <div class="Adding m-2">
                    <button class="btn btn-primary " id="openFormBtnAdd">ADD</button>
                </div>

                <div class="table table-responsive m-2">
                    <table class="table table-bordered">
                        <thead class="header fixed-top">
                            <tr>
                                <th class="th" scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th class="th" scope="col">Course</th>
                                <th class="th" scope="col">Year</th>
                                <th class="th" scope="col">Section</th>
                                <th class="th" scope="col">Username</th>
                                <th class="th" scope="col">Password</th>
                                <th class="th" scope="col">Position</th>
                                <th class="th" scope="col">Action</th>
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

                <!-- Edit form-->
                <div class="overlay-form" id="overlayFormuser">
                    <div class="form-container">
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

                            <button type="submit" class="btn btn-primary"  id="openFormBtnEdit" name="Edit_btn">update</button>
                        </form>
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

                            <button type="submit" class="btn btn-primary"  id="openFormBtnAdd" name="Add_btn">Add</button>
                        </form>
                    </div>
                </div>
                <?php
                    if (isset($_POST['Add_btn'])) {
                        $name = $_POST['name'];
                        $course = $_POST['course'];
                        $year = $_POST['year'];
                        $section = $_POST['section'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $position = $_POST['position'];

                        try {
                            // Set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Prepare the SQL INSERT statement
                            $stmt = $conn->prepare("INSERT INTO `user_account_db` (Name, Course, Year, Section, Username, Password, Position) VALUES (:name, :course, :year, :section, :username, :password, :position)");
                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':course', $course);
                            $stmt->bindParam(':year', $year);
                            $stmt->bindParam(':section', $section);
                            $stmt->bindParam(':username', $username);
                            $stmt->bindParam(':password', $password);
                            $stmt->bindParam(':position', $position);
                            $stmt->execute();
                            echo "<script>alert('Successfully Added')</script>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                ?>
            </div>

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

openFormBtnEdit.forEach(function(button) {
    button.addEventListener("click", function() {
        overlayFormEdit.style.display = "flex";
    });
});

closeFormBtnEdit.addEventListener("click", function() {
    overlayFormEdit.style.display = "none";
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