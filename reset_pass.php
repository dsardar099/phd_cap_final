<?php
session_start();

if(isset($_SESSION) && isset($_SESSION['type'])) {
    if($_SESSION['type'] == 'user'){
        header('location:home.php');
    }
    
}

include('external_links.php');
include('db_file/db_conn.php');
include('commonFILES/function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password || phd capital</title>
    <link rel="stylesheet" href="assets/signup.css">
    <style>
        .card-width {
            width: 100%;
        }

        @media (min-width: 768px) {

            /* For card in signup form */
            .card-width {
                width: 50%;
                min-height: 600px;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="card bg-light w-100">
            <article class="card-body mx-auto card-width">
                <div class="d-none d-md-block" style="min-height:130px"></div>
                <h4 class="card-title mt-3 text-center">Forgot your password ?</h4>
                <p class="text-center">Reset Your Account Password From Here</p>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="u_email" class="form-control" placeholder="Email address" type="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-5 text-center pt-4">
                            <div class="form-group">
                                <button name="u_submit" type="submit" class="w-100 btn btn-lg btn-Success"> Reset Password </button>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 text-center pt-2">
                            <p class="text-center">Have an account? <a href="signin.php">Log In</a> </p>
                        </div>
                    </div>

                    <!-- form-group// -->

                </form>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->

    <?php
    if (isset($_POST['u_submit'])) {
        if ($con) {
            $u_email = mysqli_real_escape_string($con, $_POST['u_email']);

            $email_query = "SELECT `email` FROM `userdata` WHERE email='$u_email'";
            $email_check = mysqli_query($con, $email_query);

            if ($email_check) {
                $email_count = mysqli_num_rows($email_check);

                if ($email_count != 1) {
    ?>
                    <script>
                        alert('Could not process your request');
                    </script>
                    <?php
                } else {
                    $u_pass=generateRandomString();
                    $encryp_u_pass = password_hash($u_pass, PASSWORD_BCRYPT);

                    $update_query = "UPDATE `userdata` SET `pass`='$encryp_u_pass' WHERE email='$u_email'";

                    $res = mysqli_query($con, $update_query);
                    $confirm=mail($u_email,"PASWORD RESET","NEW PASSWORD: $u_pass","From: webmaster@example.com");
                    if ($res && $confirm) {
                    ?>
                        <script>
                            alert('Password Reset Seccessfull!! Please check your email to get new password');
                            window.location.replace('signin.php');
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            alert('Some problem occurred, please try again');
                        </script>
                <?php
                    }
                }

            } else {
                ?>
                <script>
                    alert('Some problem occurred, please try again');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Some problem occurred, please try again');
            </script>
    <?php
        }
    }
    ?>

</body>

</html>