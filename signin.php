<?php
    error_reporting(0);

    session_start();
    if(isset($_SESSION) && isset($_SESSION['type'])) {
        if($_SESSION['type'] == 'user'){
            header('location:home.php');
        }
        
    }

    include('external_links.php');
    include('db_file/db_conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin || phd capital</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/icon/phd_icon.ico">
    <link rel="stylesheet" href="assets/signin.css">

        <style>
            body{
            /*background: url(assets/img/home1.jpg) no-repeat;*/
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
        }
            
            
                    
.context {
    width: 100%;
    position: absolute;
    top:50vh;
    
}

.context h1{
    text-align: center;
    color: #fff;
    font-size: 50px;
}


.area{
    background: #4e54c8;  
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
    width: 100%;
    height:100vh;
    
   
}

.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
    
    

}
            
    ._logo{
        width: 80px;
        margin-top: -40px;
        
    }
    
</style>
</head>
<body>
    <div class="context">
        
    </div>


<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div >
    
    <div class="container" >



<div class="card " style="background-color: rgba(29,33,36,.8)">
    <div class="text-center logo-bg">
        <img src="assets/icon/phd_icon.png" alt="icon" class="_logo">
    </div>
    
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center text-light">Log in</h4>
	
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	
        
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="u_l_email" class="form-control" placeholder="Email address" type="email" required>
    </div> 
    <br>

        
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="u_l_pass" class="form-control" placeholder="Type password" type="password" required>
    </div> 
    <br>
                                          
    <div class="form-group">
        <button type="submit" class="w-100 btn btn-lg btn-Success" name="u_l_submit"> Log in </button>
    </div> 

    <label style="display: flex; justify-content: center"><a href="reset_pass.php">Forgot password?</a></label>
    <br>
    <p class="text-center text-light">Don't Have an account? <a href="signup.php">Create Account</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
    <?php
        if(isset($_POST['u_l_submit'])){
            if($con){
                $user_login_email = mysqli_real_escape_string($con, $_POST['u_l_email']);
                $user_login_pass = mysqli_real_escape_string($con, $_POST['u_l_pass']);

                $email_query = "select * from userdata where email='$user_login_email'";
                $query = mysqli_query($con, $email_query);

                $email_count = mysqli_num_rows($query);
                if($email_count){
                    $userdata = mysqli_fetch_assoc($query);
                    $db_pass = $userdata['pass'];
                    $pass_verify = password_verify($user_login_pass, $db_pass);

                    if($pass_verify){
                        $_SESSION['user_name'] = $userdata['name'];
                        $_SESSION['user_db_id'] = $userdata['id'];
                        $_SESSION['type'] = "user";

                        ?>
                        <script>
                            //swal("Good job!", "Logged in Succesfully", "success");
                            //alert("Logged in sucesfully");
                            window.location.replace('home.php');
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert('Incorrect Information');
                        </script>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>
                        alert('You do not have an account. Create A new Account');
                        window.location.replace('signup.php');
                    </script>
                    <?php

                }
            }
            else{
                ?>
                <script>
                    alert('Network Problem, please try again later');
                </script>
                <?php
            }
        }
            

    ?>
</body>
</html>