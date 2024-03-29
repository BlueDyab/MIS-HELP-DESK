
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sample loader</title>
    </head>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: montserrat;
            background-color: #e2e3dc;
        }
        .center{
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .ring{
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            animation: ring 1s infinite;
        }
        @keyframes ring{
            
            10%{
                transform: rotate(0deg);
                box-shadow: 1px 5px 10px #ff9100;
            }
            25%{
                transform: rotate(50deg);
                box-shadow: 1px 5px 10px #ff9100;
            }
            50%{
                transform: rotate(150deg);
                box-shadow: 1px 5px 10px #ff9100;
            }
            75%{
                transform: rotate(250deg);
                box-shadow: 1px 5px 10px #ff9100;
            }
            100%{
                transform: rotate(350deg);
                box-shadow: 1px 5px 10px #ff9100;
            }
        }
        .ring:before{
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(255, 255, 255,.3);
        }
        span{
            color: #737373;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 200px;
            animation: text 1s ease-in-out infinite;
        }
        @keyframes text{
            50%{
                color: black;
            }
        }
    </style>
    <body>
        <div class="center">
            <div class="ring"></div>
            <span>Loading....</span>
        </div>
    </body>
    <script>
        // JavaScript code for redirection after 2 seconds
        setTimeout(function(){
            window.location.href = "./Database/Login.php";
        }, 2000); // 2000 milliseconds = 2 seconds
    </script>
</html>
<?php
    session_start();
    // Store input values in session variables
    if(isset($_POST['login_btn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $hashed_password;
    }
?>