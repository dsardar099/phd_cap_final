
<?php
    include('../db_file/db_conn.php');

    session_start();

    $user_id = $_SESSION['user_db_id'];
    $fetch_query = "select * from userdata where id='$user_id'";
    $run_query = mysqli_query($con, $fetch_query);
    if($run_query){       
        $user_home_data = mysqli_fetch_assoc($run_query);
        
        $home_username = $user_home_data['name'];
        $home_email = $user_home_data['email'];
        $home_phone = $user_home_data['phone'];
        $home_dob = $user_home_data['dob'];
        $home_adhaar = $user_home_data['adhaar'];
        $home_pan = $user_home_data['pan'];
        
        $u_bank_name = $user_home_data['b_name'];
        $u_bank_ifsc = $user_home_data['b_ifsc'];
        $u_bank_accno = $user_home_data['b_acc'];
        
        
    }
 
?>

<style>
    .modal-backdrop {
        background-color: grey;
        opacity: .2;
}
</style>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Account Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
          
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            
            <div class="row">
                <div class="col-lg-6 col-12">
                    <label for="inputName" >Name</label>
                    <input type="text" id="inputName" class="form-control" name="h_name" placeholder="Name" value="<?php echo $home_username ?>" required ><br>
                </div>
                <div class="col-lg-6 col-12">
                    <label for="inputEmail">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" name="h_email" placeholder="Email address" value="<?php echo $home_email ?>" required><br>            
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <label for="inputPhone">Phone No</label>
                    <input type="number" id="inputPhone" class="form-control" name="h_phone" placeholder="Phone No" value="<?php echo $home_phone ?>" required><br>
                </div>
                <div class="col-lg-6 col-12">
                    <label for="inputDOB">Date of Birth</label>
                    <input type="date" id="inputDOB" class="form-control" name="h_dob" placeholder="Email address" value="<?php echo $home_dob ?>" required><br>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <label for="inputAdhaar" >Adhaar Number</label>
                    <input type="text" id="inputAdhaar" class="form-control" name="h_adhaar" placeholder="Adhaar number" value="<?php echo $home_adhaar ?>" required ><br>
                </div>
                <div class="col-lg-6 col-12">
                    <label for="inputPan" >Pan Number</label>
                    <input type="text" id="inputPan" class="form-control" name="h_pan" placeholder="Pan number" value="<?php echo $home_pan ?>" required><br>       
                </div>
            </div>          
                       
            <hr>
            
            <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <span>Bank Details</span>
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <label for="bankname" >Name Of The Bank</label>
                                    <input type="text" id="bankname" class="form-control" name="h_bank_name" placeholder="Bank Name" value="<?php echo $u_bank_name ?>"  ><br>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="ifsc_no">IFSC Number</label>
                                    <input type="text" id="ifsc_no" class="form-control" name="h_ifsc" placeholder="IFSC no" value="<?php echo $u_bank_ifsc ?>"><br>            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <label for="accno" >Bank Account Number</label>
                                    <input type="number" id="accno" class="form-control" name="h_accno" placeholder="Bank Acc No" value="<?php echo $u_bank_accno ?>"  ><br>
                                </div>
                            </div>
                      </div>
                    </div>
                  </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="save_data">Save</button>
                </div>
        
        </form>        
      </div>
      
    </div>
  </div>
</div>

<?php
    
    if(isset($_POST['save_data'])){
        $update_name = mysqli_real_escape_string($con, $_POST['h_name']);
        $update_email = mysqli_real_escape_string($con, $_POST['h_email']);
        $update_phone = mysqli_real_escape_string($con, $_POST['h_phone']);
        $update_dob = mysqli_real_escape_string($con, $_POST['h_dob']);
        $update_adhaar = mysqli_real_escape_string($con, $_POST['h_adhaar']);
        $update_pan = mysqli_real_escape_string($con, $_POST['h_pan']);
        
        $update_b_name = mysqli_real_escape_string($con, $_POST['h_bank_name']);
        $update_b_ifsc = mysqli_real_escape_string($con, $_POST['h_ifsc']);
        $update_b_accno = mysqli_real_escape_string($con, $_POST['h_accno']);
        
        $update_userdata_query = "update userdata set name='$update_name', email='$update_email', phone='$update_phone', dob='$update_dob', adhaar='$update_adhaar', pan='$update_pan', b_name='$update_b_name', b_ifsc='$update_b_ifsc', b_acc = '$update_b_accno' where id=$user_id";
        
        $run_userdata_update_query = mysqli_query($con, $update_userdata_query);
        if($run_userdata_update_query){
            ?>
                <script>
                    alert("Account Updated Succesfully");
                    window.location.replace('home.php'); 
                </script>            
            <?php
            
        }
        else{
            ?>
                <script>
                    alert("Failed To Update, Please Try Again");
                </script>
            <?php
            
        }
        
    }
    
    
    
?>

