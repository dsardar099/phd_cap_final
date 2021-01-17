<?php
include('../db_file/db_conn.php');

if (isset($_POST['adupdate'])) {
    $id = $_POST['aid'];
    $name = mysqli_real_escape_string($con, $_POST['aname']);
    $email = mysqli_real_escape_string($con, $_POST['aemail']);
    $phone = mysqli_real_escape_string($con, $_POST['aphone']);


    $q = "UPDATE `admin` SET `name`='$name',`phone`='$phone',`email`='$email' WHERE `id`='$id'";
    $r = mysqli_query($con, $q);
    if ($r == true) {
        header('location:dashboard.php?stat=1');
    } else {
        header('location:dashboard.php?stat=0');
    }
}

?>
