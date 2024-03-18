<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./css/admin.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
     <!-- Bootstrap Icons CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<style>
    body{
  background-color: #e2e3dc;
        
    }
      /* Main Content CSS */
      .main-content {
            margin-top: 10%;
        }
        .main-box {
            padding: 20px;
            border: 2px solid black;
            margin-bottom: 20px;
            border-radius: 30px;
            background-color: white;

    
        }
        .main-box h3 {
            margin-bottom: 10px;
        }
        .small-box {
            width: 120px;
            height: 70px;
            border: 2px solid black;
            text-align: center;
            padding-top: 10px;
            display: inline-block;
            border-radius: 30px;
        }
        .icon {
            background-color: #f1c232; /* New background color */ 
        }
    </style>
</head>
<body>
  
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="side-navbar">
                <img src="./image/macaraeg.png" alt="Profile Image">
                <h1 class="text">Christopher Co</h1>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li>
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#requestsMenu" aria-expanded="false" aria-controls="requestsMenu">Request</a>
                        <div class="collapse" id="requestsMenu">
                            <ul>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Equipment</a></li>
                                <li><a href="#">Feedback</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">Inquiry</a></li>
                    <li><a href="#">Record</a></li>
                    <li><a href="#">User Account</a></li>
                </ul>
                <div class="login-btn">
                    <button type="button" class="btn bg-light"><a href="../Login.php" style="text-decoration: none; color: black;">Log Out</a></button>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-9 main-content">
            <div class="container">
                <div class="row">
                    <!-- First row -->
                    <div class="row">
                        <!-- Main box 1 -->
                        <div class="col-md-6">
                            <div class="main-box text-center ">
                                <h3>Main Box 1</h3>
                                <div class="small-box">Pending<br><span id="pendingCount">10</span></div>
                                <div class="small-box">On-going<br><span id="ongoingCount">5</span></div>
                                <div class="small-box">Done<br><span id="doneCount">15</span></div>
                            </div>
                        </div>
                        <!-- Main box 2 -->
                        <div class="col-md-6">
                            <div class="main-box text-center ">
                                <h3>Main Box 2</h3>
                                <div class="small-box">Pending<br><span id="pendingCount2">8</span></div>
                                <div class="small-box">On-going<br><span id="ongoingCount2">3</span></div>
                                <div class="small-box">Done<br><span id="doneCount2">20</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- Second row -->
                    <div class="row">
                        <!-- Main box 3 -->
                        <div class="col-md-6">
                            <div class="main-box text-center">
                                <h3>Main Box 3</h3>
                                <div class="small-box">Pending<br><span id="pendingCount3">12</span></div>
                                <div class="small-box">On-going<br><span id="ongoingCount3">7</span></div>
                                <div class="small-box">Done<br><span id="doneCount3">18</span></div>
                            </div>
                        </div>
                        <!-- Main box 4 -->
                        <div class="col-md-6">
                            <div class="main-box text-center">
                                <h3>Main Box 4</h3>
                                
                                <div class="small-box">
                                <i class="bi bi-circle icon"></i> Pending<br><span id="pendingCount">10</span>
                                </div>
                                <div class="small-box">On-going<br><span id="ongoingCount4">9</span></div>
                                <div class="small-box">Done<br><span id="doneCount4">22</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>