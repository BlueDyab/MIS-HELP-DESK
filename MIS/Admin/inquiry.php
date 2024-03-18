<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="./css/admin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
        /* Custom CSS for small boxes */
        .small-box {
            width: 100px;
            height: 100px;
            border: 1px solid black;
            margin-top: 10px;
            text-align: center;
            padding-top: 30px;
            display: inline-block;
        }
        .main-box {
            padding: 20px;
            border: 1px solid black;
            margin-bottom: 20px;
        }
    </style>
<body>

<div class="container mt-5">
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
                <div class="main-box text-center ">
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
                    <div class="small-box">Pending<br><span id="pendingCount4">6</span></div>
                    <div class="small-box">On-going<br><span id="ongoingCount4">9</span></div>
                    <div class="small-box">Done<br><span id="doneCount4">22</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>