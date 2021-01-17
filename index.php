<?php
    error_reporting(0);

    session_start();

    include('external_links.php');
    include('db_file/db_conn.php');

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/icon/phd_icon.ico">
    <title>phd capital</title>
    
    <style>
                html, body {
          width: 100%;
          height:100%;
        }

        body {
            background: linear-gradient(-45deg, #f2d752, #e73c7e, #6849e5, #48228e);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
        
        .c_style{
            height: 40px;
            margin-right: 10px;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        a{
            color: #fff;
        }
        a:hover{
            color: #fff;
        }
        .f{
            font-family: 'Josefin Sans', sans-serif;
            border-bottom: 2.5px solid #fff;
        }
    </style>
    
</head>
<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0 f"><img src="assets/icon/phd_icon.png" width="50">PHD Capital</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <button type="button" class="btn btn-success c_style"><a class="nav-link" href="signin.php">Log in</a></button>
            <button type="button" class="btn btn-outline-success c_style" ><a class="nav-link" href="signup.php">Sign up</a></button>
            
          </nav>
        </div>
      </header>

      <main class="px-3">
        <h1>PHD CAPITAL</h1>
        <p class="lead">PHD CAPITAL provides you a great platform for Technical Analysis Study, from where you can learn the stock market. Here, you can learn from the very basic fundamentals of the stock market to the A to Z fundamentals of technical analysis. We give different mind-blowing strategies and golden rules that help you to become a professional trader in the stock market. </p>
        <p class="lead">
          <a href="https://phdcapital.in/?v=e5477cbee260" target="_blank" class="fw-bold" style="color: #f2d848;font-family: 'Josefin Sans', sans-serif;">Visit Us</a>
        </p>
      </main>

      <footer class="mt-auto text-white-50">
        <p></p>
      </footer>
    </div>


</body>
</html>