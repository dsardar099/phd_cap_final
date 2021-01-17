<?php
    error_reporting(0);

    session_start();
  

    if (!isset($_SESSION) || $_SESSION['type'] != 'user') {
        header('location:signin.php');
    }


    include('external_links.php');
    include('db_file/db_conn.php');
    include('commonFILES/user_navbar.php');
    include('commonFILES/user_acc_modal.php');
    include('commonFILES/user_pass_change.php');

    $user_id = $_SESSION['user_db_id'];

    $acc_bal_query = "select * from user_balance where user_id='$user_id'";
    $run_bal_query = mysqli_query($con, $acc_bal_query);
    if($run_bal_query){       
        $user_bal_data = mysqli_fetch_assoc($run_bal_query);
        $m_pl = $user_bal_data['m_pl'];
        $t_pl = $user_bal_data['t_pl'];
        $e_w = $user_bal_data['e_w'];
        $b_k = $user_bal_data['b_k'];
    }
    else{
        echo "zzzzzzz";
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="assets/home.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/icon/phd_icon.ico">
    <style>
        body{
            background: url(assets/img/home.jpg) no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
        }  
        .money-back-button{
            float: right;
            height: 40px;
            display: flex;
            align-content: center;
            justify-content: center;
        }
        .d_t{
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 30px;
            color: rgb(237, 209, 73)
        }
        .terminal{
            font-size: 20px;
            letter-spacing: 1.5px;
            font-family: 'Josefin Sans', sans-serif;
        }
        .alert-color{
            background-color: rgb(224, 210, 53);
            opacity: .8;
        }
        
       
    </style>
</head>
<body>
    <div class="container center-container">
        <div class="row top-row">
            <div class="col-lg-3 col-12  top-row-div">
                <div class="card card_radius" style="width: 18rem;height: 180px; background: linear-gradient(90deg, rgba(2,0,36,.5) 26%, rgba(29,90,161,0.3) 76%);">
                    <div class="card-parent-div">
                        <div class="card-img-top img-card" style="border-bottom-right-radius: 30px;background-color: rgba(0,0,0,0.5); display:block;z-index: 2 ;height: 180px"></div>
                        <div class="centered">Monthly P/L<br><span class="d_t"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $m_pl ?></span></div>
                        
                    </div>                  
                    
                </div>
            </div>
            
            <div class="col-lg-3 col-12  top-row-div">
                <div class="card card_radius" style="width: 18rem;height: 180px; background: linear-gradient(90deg, rgba(2,0,36,.5) 26%, rgba(29,90,161,0.3) 76%);">
                    <div class="card-parent-div">
                        <div class="card-img-top img-card" style="border-bottom-right-radius: 30px;background-color: rgba(0,0,0,0.5); display:block;z-index: 2 ;height: 180px"></div>
                        <div class="centered">Today P/L<br><span class="d_t"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $t_pl ?></span></div>
                    </div>                  
                </div>
            </div>
            
            <div class="col-lg-3 col-12  top-row-div">
                <div class="card card_radius" style="width: 18rem;height: 180px; background: linear-gradient(90deg, rgba(2,0,36,.5) 26%, rgba(29,90,161,0.3) 76%);">
                    <div class="card-parent-div">
                        <div class="card-img-top img-card" style="border-bottom-right-radius: 30px;background-color: rgba(0,0,0,0.5); display:block;z-index: 2 ;height: 180px"></div>
                        <div class="centered">E-Wallet<br><span class="d_t"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $e_w ?></span></div>                                     
                                                                          
                    </div>                    
                </div>
            </div>
            <div class="col-lg-3 col-12  top-row-div">
                <div class="card card_radius" style="width: 18rem;height: 180px; background: linear-gradient(90deg, rgba(2,0,36,.5) 26%, rgba(29,90,161,0.3) 76%);">
                    <div class="card-parent-div">
                        <div class="card-img-top img-card" style="border-bottom-right-radius: 30px;background-color: rgba(0,0,0,0.5); display:block;z-index: 2; height: 180px "></div>
                        <div class="centered">Brokerage<br><span class="d_t"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $b_k ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12  second-row-div">
                
                <div class="alert alert-color" role="alert">
                  PHD Capital<a href="stock_data.php" class="alert-link terminal">&nbsp;Terminal</a>
                </div>            
                
            </div>
        </div>
    </div>
    
    
    
    
</body>
</html>