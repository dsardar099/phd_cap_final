<?php
    session_start();

    $nav_name = explode(" ", $_SESSION['user_name']);

?>
<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand userName">Hello <?php echo $nav_name[0] ?></a>
<!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Your Account 
            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Account Info</a></li>
              
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changepass">Change Password</a></li>
              
            <li style="background-color: #dddddd"><a class="dropdown-item" href="#">Log out</a></li>
            
          </ul>
        </li>
-->
            <div class="btn-group dropstart">
              <button type="button" class="btn btn-secondary dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-expanded="false" style=" background: none;border: none;">
                    <i class="fa fa-user-circle" aria-hidden="true" style=" font-size: 27px"></i>
              </button>
              <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Account Info</a></li>
              
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changepass">Change Password</a></li>
              
                    <li style="background-color: #dddddd"><a class="dropdown-item" href="commonFILES/logout.php">Log out</a></li>
              </ul>
            </div>
        </div>
    </nav>