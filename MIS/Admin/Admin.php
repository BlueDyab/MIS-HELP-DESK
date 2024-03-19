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
        background-color:  #e2e3dc;
    }

 /* dashboard*/
    
    .dashboard .box {
        background-color:white;
        border: 1px solid #dee2e6;
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 5px;
        height: 200px;
    }

    .main-box {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        padding: 30px;
        margin-bottom: 40px;
        border-radius: 5px;
        height: auto;
    }


    .main-box h3 {
        margin-bottom: 10px;
        font-weight: 700;
    }
    h2{
        font-size: 50px;
        font-weight: 700;
        text-align: center;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .small-box {
        display: inline-block;
        margin-inline: 10px;
        margin-top: 5px;
        background-color: #17a2b8;
        color: white;
        border-radius: 5px;
        font-size: 15px;
        width: 100px;
        
    }

    .small-box span {
        font-weight: bold;
        font-size: 15px;
    }
    .main-box h3 i{
        font-size: 35px;
        margin-right: 10px;
    }

</style>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                <img src="../image/uccLogo.png" alt="Company Logo" class="logo-imig">
                </button>
                <div class="sidebar-logo">
                    <a href="#">MIS</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#"  id="profile" class="sidebar-link">
                    <i class="fa-solid fa-user"></i></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="fa-solid fa-code-pull-request"></i>
                        <span>Request</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" id="service" class="sidebar-link">Service</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#"  id="equipment" class="sidebar-link">Equipment</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#"  id="feedback"class="sidebar-link">Feedback</a>
                        </li>
                    </ul>
                </li>
           
                <li class="sidebar-item">
                    <a href="#" id="inquiry" class="sidebar-link">
                    <i class="fa-solid fa-message"></i>
                        <span>Inquiry</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" id="record" class="sidebar-link">
                    <i class="fa-solid fa-folder"></i>
                        <span>Record</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" id="account" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>User Account  </span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" id="logout" class="sidebar-link">
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
                        <div class="col-md-6">
                            <div class="main-box text-center ">
                                <h3><i class="fa-solid fa-user"></i></i>Service</h3>
                                <div class="small-box">Pending<br><span id="pendingCount">0</span></div>
                                <div class="small-box">On-going<br><span id="ongoingCount">0</span></div>
                                <div class="small-box">Done<br><span id="doneCount">0</span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="main-box text-center ">
                                <h3><i class="fa-solid fa-wrench"></i>Equipment</h3>
                                <div class="small-box">Pending<br><span id="pendingCount">0</span></div>
                                <div class="small-box">On-going<br><span id="ongoingCount">0</span></div>
                                <div class="small-box">Done<br><span id="doneCount">0</span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="main-box text-center ">
                                <h3><i class="lni lni-support"></i>Feedback</h3>
                                <div class="small-box"></i>Pending<br><span id="pendingCount">0</span></div>
                                <div class="small-box">On-going<br><span id="ongoingCount">0</span></div>
                                <div class="small-box">Done<br><span id="doneCount">0</span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="main-box text-center ">
                                <h3><i class="fa-solid fa-user"></i></i>User</h3>
                                <div class="small-box">Pending<br><span id="pendingCount">0</span></div>
                                <div class="small-box">On-going<br><span id="ongoingCount">0</span></div>
                                <div class="small-box">Done<br><span id="doneCount">0</span></div>
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
    </script>
</body>

</html>