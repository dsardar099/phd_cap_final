<?php
include('../db_file/db_conn.php');

if (isset($_POST['adupdate'])) {
    $id = $_POST['aid1'];
    $pass = mysqli_real_escape_string($con, $_POST['apass']);
    $pass=password_hash($pass, PASSWORD_BCRYPT);


    $q = "UPDATE `admin` SET `pass`='$pass' WHERE `id`='$id'";
    $r = mysqli_query($con, $q);
    if ($r == true) {
        header('location:dashboard.php?stat=1');
    } else {
        header('location:dashboard.php?stat=0');
    }
}

?>
