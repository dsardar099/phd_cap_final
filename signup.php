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
    <title>Signup || phd capital</title>
    <link rel="stylesheet" href="assets/signup.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/icon/phd_icon.ico">
    <style>
        .card-width {
            width: 100%;
        }
        @media (min-width: 768px) {
            /* For card in signup form */
            .card-width {
                width: 50%;
            }
        }
        
        body{
            background: url(assets/img/home1.jpg) no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
        }
        
        ._logo{
            width: 80px;
            margin-top: -40px;
        
        }
        
    </style>

</head>

<body>
    <div class="container">
        <div class="card  w-100" style="background-color: rgba(29,33,36,.8)">
        <div class="text-center logo-bg">
            <img src="assets/icon/phd_icon.png" alt="icon" class="_logo">
        </div>
            <article class="card-body mx-auto card-width">
                <h4 class="card-title mt-3 text-center text-light">Create Account</h4>
                <p class="text-center text-light">Get started with your free account</p>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="u_name" class="form-control" placeholder="Full name" type="text" required>
                            </div>
                        </div>
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
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <input name="u_phone" class="form-control" placeholder="Phone number" type="text" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="u_gender" id="inlineRadio_male" value="m" required>
                                <label class="form-check-label text-light" for="inlineRadio_male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="u_gender" id="inlineRadio_female" value="f" required>
                                <label class="form-check-label text-light" for="inlineRadio_female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="u_gender" id="inlineRadio_other" value="o" required>
                                <label class="form-check-label text-light" for="inlineRadio_other">Other</label>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-calendar-o"></i></span>
                                </div>
                                <input name="u_dob" class="form-control" placeholder="DOB" type="date" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="u_adhaar" class="form-control" placeholder="Adhaar number" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-id-card-o"></i> </span>
                                </div>
                                <input name="u_pan" class="form-control" placeholder="pan number" type="number">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center pt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="u_pass" class="form-control" placeholder="Create password" type="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-5 text-center pt-4">
                            <div class="form-group">
                                <button name="u_submit" type="submit" class="w-100 btn btn-lg btn-Success "> Create Account </button>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 text-center pt-2">
                            <p class="text-center text-light">Have an account? <a href="signin.php">Log In</a> </p>
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
            $u_name = mysqli_real_escape_string($con, $_POST['u_name']);
            $u_email = mysqli_real_escape_string($con, $_POST['u_email']);
            $u_phone = mysqli_real_escape_string($con, $_POST['u_phone']);
            $u_gender = mysqli_real_escape_string($con, $_POST['u_gender']);
            $u_dob = mysqli_real_escape_string($con, $_POST['u_dob']);
            $u_adhaar = mysqli_real_escape_string($con, $_POST['u_adhaar']);
            $u_pan = mysqli_real_escape_string($con, $_POST['u_pan']);
            $u_pass = mysqli_real_escape_string($con, $_POST['u_pass']);

            $email_query = "select * from userdata where email='$u_email'";
            $email_check = mysqli_query($con, $email_query);

            if ($email_check) {
                $email_count = mysqli_num_rows($email_check);
                if ($email_count > 0) {
    ?>
                    <script>
                        alert('Email already exist, please Sign in');
                    </script>
                    <?php
                } else {
                    $encryp_u_pass = password_hash($u_pass, PASSWORD_BCRYPT);

                    $insert_query = "insert into userdata(name,email,phone,gender,dob,adhaar,pan,pass,b_name,b_ifsc,b_acc) values('$u_name','$u_email','$u_phone','$u_gender','$u_dob','$u_adhaar','$u_pan','$encryp_u_pass','','','')";

                    $res = mysqli_query($con, $insert_query);
                    if ($res) {
                     
                        
                        $q = "SELECT `id` FROM `userdata` WHERE email='$u_email'";
                        $r = mysqli_query($con, $q);
                        $d = mysqli_fetch_assoc($r);
                        $id = $d['id'];

                        $q1 = "INSERT INTO `user_balance`(`user_id`, `m_pl`, `t_pl`, `e_w`, `b_k`) VALUES ('$id',0,0,0,0)";
                        
                        $r1 = mysqli_query($con, $q1);
                        if ($r1 == 1) {
                        ?>
                            <script>
                                alert('Account Created Succesfully');
                                window.location.replace('signin.php');
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
                    else {
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