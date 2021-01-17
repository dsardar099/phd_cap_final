
<style>
    #update_pass{
        display: none;
    }
   
</style>
<?php
    include('../db_file/db_conn.php');

    include('../external_links.php');
   

    session_start();

    $user_id = $_SESSION['user_db_id'];
    $fetch_query = "select * from userdata where id='$user_id'";
    $run_query = mysqli_query($con, $fetch_query);
    if($run_query){       
        $user_home_data = mysqli_fetch_assoc($run_query);
        
        $home_pass = $user_home_data['pass'];
    }

?>
<div class="modal fade" id="changepass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">         
        <div class="row" >
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"> 
                
                    <div class="input-group mb-3" id="check_pass">
                      <input type="password" class="form-control" placeholder="type your current password" aria-label="type your current password" aria-describedby="button-addon2" name="h_c_pass">
                      <button type="submit" class="btn btn-secondary" name="check_p">Check</button>
                    </div>              
            </form>         
        </div>
      </div>    
    </div>
  </div>
</div>
          
     


<?php
    
    if(isset($_POST['check_p'])){
        
        $current_password = mysqli_real_escape_string($con, $_POST['h_c_pass']);
        
        $pass_verify = password_verify($current_password, $home_pass);
        if($pass_verify){
            ?>
            <script>                  
                window.location.replace('commonFILES/update_pass.php');
            </script>
            <?php
        }
        else{
            ?>
            <script>                  
                alert("Password Not Matched !");
            </script>
            <?php         
        }
    }   
?>