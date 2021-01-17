<?php
    session_start();
    if (!isset($_SESSION) || $_SESSION['type'] != 'user') {
        header('location:signin.php');
    }

    include('../db_file/db_conn.php');
    include('../external_links.php');
    
    $user_id = $_SESSION['user_db_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/icon/phd_icon.ico">
    <title>Update Password</title>
    <style>
        body{
            background-color: rgba(53,48,48,1);
        }
        .main-pass-content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            
        }
        
        

    </style>
</head>
<body class="text-center"> 
    
    <div class="main-pass-content">
      
               <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">
                        <div class="alert alert-success" role="alert">
                            Update Password
                        </div>
                    </h5>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="password" id="inputNewPassword" name="h_n_pass" class="form-control" placeholder="Type Your New Password" required><br>   
                            <div>      
                                <button type="submit" class="btn btn-success" name="update">Update</button>
                            </div>
                        </form>
                  </div>
                </div>   
    </div>
    
    <?php
        if(isset($_POST['update'])){
        $h_new_pass = mysqli_real_escape_string($con, $_POST['h_n_pass']);
        
        $encryp_new_pass = password_hash($h_new_pass, PASSWORD_BCRYPT);
       
        $update_pass_query = "update userdata set pass='$encryp_new_pass' where id='$user_id'";
        
        $res = mysqli_query($con, $update_pass_query);
        
        if($res){                   
            ?>
            <script>
                alert('Changed Succesfully');
                //window.reload();
            </script>
            <?php

        header('location:logout.php');
                                
         }
         else{
            ?>
            <script>
                alert('ERROR! please try again');
                //window.reload();
            </script>
            <?php       
         }
    }   
    
    ?>
</body>
</html>