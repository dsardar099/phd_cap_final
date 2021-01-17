<!-- Admin Signup -->

<?php
    session_start();
    
    include('../external_links.php');
    include('../db_file/db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup || phd_capital</title>
    <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body class="text-center">  
    <main class="form-signin">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <img class="mb-4" src="../assets/icon/phd_icon.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <label for="inputName" class="visually-hidden">Name</label>
        <input type="text" id="inputName" class="form-control" name="a_name" placeholder="Name" required autofocus><br>

        <label for="inputPhone" class="visually-hidden">Phone No</label>
        <input type="number" id="inputPhone" class="form-control" name="a_phone" placeholder="Phone No" required><br>

        <label for="inputEmail" class="visually-hidden">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="a_email" placeholder="Email address" required><br>

        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="inputPassword" name="a_pass" class="form-control" placeholder="Password" required>
        
        <button class="w-100 btn btn-lg btn-Success" type="submit" name="signup">Sign up</button>
        <p class="mt-5 mb-3 text-muted">Already have an Account?&nbsp;<a href="index.php">Signin Here</a></p>
    </form>
    </main>  

    <?php
      if(isset($_POST['signup'])){
        if($con){
            $admin_name = mysqli_real_escape_string($con, $_POST['a_name']);
            $admin_phone = mysqli_real_escape_string($con, $_POST['a_phone']);
            $admin_email = mysqli_real_escape_string($con, $_POST['a_email']);
            $admin_pass = mysqli_real_escape_string($con, $_POST['a_pass']);

            $email_query = "select * from admin where email='$admin_email'";
            $email_check = mysqli_query($con, $email_query);
            if($email_check){
                $email_count = mysqli_num_rows($email_check);
                if($email_count > 0){
                    ?>
                    <script>
                        alert('Email already exist, please Sign in');
                    </script>
                    <?php
                }
                else{
                    
                        $encryp_pass = password_hash($admin_pass, PASSWORD_BCRYPT);

                        $insert_query = "insert into admin(name,phone,email,pass) values('$admin_name','$admin_phone','$admin_email','$encryp_pass')";
                        $res = mysqli_query($con, $insert_query);
                        if($res){                   
                            ?>
                            <script>
                                alert('Account Created Succesfully');
                                window.location.replace('index.php');
                            </script>
                            <?php
                                
                        }
                        else{
                            ?>
                                <script>
                                    alert('Some problem occurred, please try again');
                                </script>
                            <?php                   
                        }
                                      
                }
            }
            else{
                ?>
                <script>
                    alert('Some problem occurred, please try again');
                </script>
                <?php
            }   
        }                  
      }
    ?>
</body>
</html>