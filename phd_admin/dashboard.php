<?php
error_reporting(0);
session_start();

if (!isset($_SESSION) || $_SESSION['type'] != 'admin') {
    header('location:index.php');
}



include('../external_links.php');
include('../db_file/db_conn.php');
include('../commonFILES/function.php');
$details = getUsers($con);
$admindetails = getAdmin($con, $_SESSION['admin_db_id']);

include('admin_modal.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> || phd capital</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/icon/phd_icon.ico">
    <style>


    </style>

</head>

<body class="bg-warning">
    <!-- <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div> -->

    <?php
    if (isset($_GET['stat'])) {
        if ($_GET['stat'] == 1) {
            echo "<script>alert('Succssfully updated');</script>";
        } else {
            echo "<script>alert('Could not process your request');</script>";
        }
        echo "<script>location.replace('dashboard.php');</script>";
    }

    ?>

    <div class="container-fluid header-1">
        <div class="row py-0 my-0 py-md-4">
            <div class="col-3 col-md-4 text-left ps-2 ps-md-5">
                <img src="../assets/img/logo.png" alt="" class="img-thumbnail logo border border-0 bg-transparent">
            </div>
            <div class="col-9 col-md-4 text-center title display-4 fw-bold my-auto">
                <span class="d-none d-md-inline">Admin </span>Dashboard
            </div>
            <div class="col-12 col-md-4">
                <div class="text-center h-100">
                    <button type="button" class="btn btn-light text-dark my-2">Welcome <?php echo $_SESSION['admin_name']; ?></button>
                    <!-- <button type="button" class="btn bcolor my-2 top-button" data-bs-toggle="modal" data-bs-target="#deposit">Deposit</button>
                    <br class="d-none d-md-block">
                    <button type="button" class="btn btn-warning my-2 top-button" data-bs-toggle="modal" data-bs-target="#withdrawl">Withdrawal</button> -->
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">PHD CAPITAL</a>

            <div class="dropdown d-md-block d-md-none">
                <button class="btn btn-secondary dropdown-toggle me-5" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle fs-3"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><button class="btn dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#showadmin">View Profile</button></li>
                    <li><button class="btn dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editadmin">Edit Profile</button></li>
                    <li><button class="btn dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#updateadminpass">Update Password</button></li>
                    <li><a class="dropdown-item" href="../commonFILES/logout.php">Logout</a></li>

                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav text-center mx-md-auto fs-4">
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" onclick="overview(this)">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="activities(this)">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="investment(this)">Investments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="pending(this)">Pending</a>
                    </li> -->
                </ul>
            </div>

            <div class="dropdown d-none d-md-block me-5 pe-5">
                <button class="btn btn-secondary dropdown-toggle me-5" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle fs-3"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><button class="btn dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#showadmin">View Profile</button></li>
                    <li><button class="btn dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editadmin">Edit Profile</button></li>
                    <li><button class="btn dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#updateadminpass">Update Password</button></li>
                    <li><a class="dropdown-item" href="../commonFILES/logout.php">Logout</a></li>

                </ul>
            </div>

        </div>
    </nav>


    <!-- user profile & home start -->
    <div class="container">
        <div class="row">
            <div class="col-12 overflow-auto">
                <table class="table table-primary table-striped table-hover my-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Name</th>
                            <th scope="col">MPL</th>
                            <th scope="col">TPL</th>
                            <th scope="col">EW</th>
                            <th scope="col">BK</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i = 0;
                        $n = sizeof($details);
                        for ($i = 0; $i < $n; $i++) {
                            echo '<tr><th scope="row">' . ($i + 1) . '</th>
                            <td>' . $details[$i]['email'] . '</td>
                            <td>' . $details[$i]['phone'] . '</td>
                            <td>' . $details[$i]['name'] . '</td>
                            <td>' . $details[$i]['mpl'] . '</td>
                            <td>' . $details[$i]['tpl'] . '</td>
                            <td>' . $details[$i]['ew'] . '</td>
                            <td>' . $details[$i]['bk'] . '</td>
                            <td> <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#showuser" uid="' . $details[$i]['id'] . '" onclick="getViewTarget(this,' . $i . ')">View</button> </td>
                            <td> <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#updateuser" uid="' . $details[$i]['id'] . '" onclick="getUpdateTarget(this,' . $i . ')">Edit</button> </td>
                            
                            </tr>';
                        }


                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- user profile & home end -->


    <!-- user profile view Modal start -->
    <div class="modal fade" id="showuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showusermodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showusermodalLabel">User Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">ID :</div>
                            <div class="col-6 col-md-3" id="id1"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">NAME :</div>
                            <div class="col-6 col-md-3" id="name1"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">EMAIL :</div>
                            <div class="col-6 col-md-3" id="email1"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">PHONE NO :</div>
                            <div class="col-6 col-md-3" id="phone1"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">GENDER :</div>
                            <div class="col-6 col-md-3" id="gender1"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">DOB :</div>
                            <div class="col-6 col-md-3" id="dob1"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">AADHAR :</div>
                            <div class="col-6 col-md-3" id="aadhar1"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">PAN :</div>
                            <div class="col-6 col-md-3" id="pan1"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">BANK :</div>
                            <div class="col-6 col-md-3" id="bank1"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">IFSC :</div>
                            <div class="col-6 col-md-3" id="ifsc1"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">ACCOUNT NO :</div>
                            <div class="col-6 col-md-3" id="account1"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">Monthly P/L</div>
                            <div class="col-6 col-md-3" id="mpl1"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">Today P/L</div>
                            <div class="col-6 col-md-3" id="tpl1"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">E Wallet</div>
                            <div class="col-6 col-md-3" id="ew1"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">Brokerage</div>
                            <div class="col-6 col-md-3" id="bk1"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- user profile view Modal end -->




    <!-- user profile update Modal start -->
    <div class="modal fade" id="updateuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateusermodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateusermodalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">ID :</div>
                            <div class="col-6 col-md-3" id="id3"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">NAME :</div>
                            <div class="col-6 col-md-3" id="name3"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 fw-bold">EMAIL :</div>
                            <div class="col-6 col-md-3" id="email3"></div>
                            <div class="col-6 col-md-3 ps-md-3 fw-bold">PHONE NO :</div>
                            <div class="col-6 col-md-3" id="phone3"></div>
                        </div>


                        <form class="row g-3 needs-validation pt-4" action="updateuser.php" method="POST" novalidate>
                            <input type="hidden" class="form-control" id="id4" name="id" required>

                            <div class="col-12 col-md-6">
                                <label for="mpl3" class="form-label text-dark fw-bold">Monthly P/L</label>
                                <input type="number" class="form-control" id="mpl3" name="mpl" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Something wrong!
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="tpl3" class="form-label text-dark fw-bold">Today P/L</label>
                                <input type="number" class="form-control" id="tpl3" name="tpl" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Something wrong!
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="ew3" class="form-label text-dark fw-bold">E Wallet</label>
                                <input type="number" class="form-control" id="ew3" name="ew" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Something wrong!
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="bk3" class="form-label text-dark fw-bold">Brokerage</label>
                                <input type="number" class="form-control" id="bk3" name="bk" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Something wrong!
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit" name="userupdate">Update</button>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- user profile update Modal end -->



        



        <script>
            var details = <?php echo json_encode($details); ?>;

            function getViewTarget(e, id) {
                var id1 = document.getElementById("id1");
                var name1 = document.getElementById("name1");
                var email1 = document.getElementById("email1");
                var phone1 = document.getElementById("phone1");
                var gender1 = document.getElementById("gender1");
                var dob1 = document.getElementById("dob1");
                var aadhar1 = document.getElementById("aadhar1");
                var pan1 = document.getElementById("pan1");
                var bank1 = document.getElementById("bank1");
                var ifsc1 = document.getElementById("ifsc1");
                var account1 = document.getElementById("account1");
                var mpl1 = document.getElementById("mpl1");
                var tpl1 = document.getElementById("tpl1");
                var ew1 = document.getElementById("ew1");
                var bk1 = document.getElementById("bk1");

                id1.innerHTML = details[id]['id'];
                name1.innerHTML = details[id]['name'];
                email1.innerHTML = details[id]['email'];
                phone1.innerHTML = details[id]['phone'];
                gender1.innerHTML = details[id]['gender'];
                dob1.innerHTML = details[id]['dob'];
                aadhar1.innerHTML = details[id]['aadhar'];
                pan1.innerHTML = details[id]['pan'];
                bank1.innerHTML = details[id]['bname'];
                ifsc1.innerHTML = details[id]['bifsc'];
                account1.innerHTML = details[id]['bacc'];
                mpl1.innerHTML = details[id]['mpl'];
                tpl1.innerHTML = details[id]['tpl'];
                ew1.innerHTML = details[id]['ew'];
                bk1.innerHTML = details[id]['bk'];
            }




            function getUpdateTarget(e, id) {
                var id1 = document.getElementById("id3");
                var name1 = document.getElementById("name3");
                var email1 = document.getElementById("email3");
                var phone1 = document.getElementById("phone3");
                var mpl1 = document.getElementById("mpl3");
                var tpl1 = document.getElementById("tpl3");
                var ew1 = document.getElementById("ew3");
                var bk1 = document.getElementById("bk3");
                var id2 = document.getElementById("id4");

                id1.innerHTML = details[id]['id'];
                name1.innerHTML = details[id]['name'];
                email1.innerHTML = details[id]['email'];
                phone1.innerHTML = details[id]['phone'];
                id2.value = details[0]['id'];
                mpl1.value = details[id]['mpl'];
                tpl1.value = details[id]['tpl'];
                ew1.value = details[id]['ew'];
                bk1.value = details[id]['bk'];
            }



            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        </script>
        <script src="assets/js/dashboard.js"></script>
</body>

</html>