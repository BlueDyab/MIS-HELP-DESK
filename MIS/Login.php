<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="stylesheet" href="./css/login.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="body1">
 
 <!----------------------- Main Container -------------------------->
 <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!----------------------- Login Container -------------------------->
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <!--------------------------- Left Box ----------------------------->
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ff7601;">
           <div class="featured-image mb-3">
            <img src="./image/uccLogo.png" class="img-fluid" style="width: 200px;">
           </div>
           <p class="text-black " style="font-family: 'Courier New', Courier, monospace; font-size: 50px; font-weight:700;">MIS</p>
       </div> 
    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>ADMIN STAFF</h2>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                </div>

                </div>
                <div class="input-group mb-5 login">
                    <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                </div>       
          </div>
       </div> 
      </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.login button').addEventListener('click', function() {
            var loginForm = document.querySelector('.login');
            loginForm.classList.add('loading');
            
            // Simulate authentication (replace this with your actual authentication logic)
            setTimeout(function() {
                // Check if authentication is successful (replace this condition with your actual authentication logic)
                var authenticationSuccessful = true;
                
                if (authenticationSuccessful) {
                    // Redirect to admin.php
                    window.location.href = './Admin/Admin.php';
                } else {
                    // If authentication fails, remove loading state and add error state (you can handle error state as per your design)
                    loginForm.classList.remove('loading');
                    loginForm.classList.add('error');
                }
            }, 2000);
        });
    });
</script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>