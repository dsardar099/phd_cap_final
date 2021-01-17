<?php
include('../db_file/db_conn.php');

if (isset($_POST['userupdate'])) {
    $id = $_POST['id'];
    $mpl = $_POST['mpl'];
    $tpl = $_POST['tpl'];
    $ew = $_POST['ew'];
    $bk = $_POST['bk'];
    $mpl = mysqli_real_escape_string($con, $mpl);
    $tpl = mysqli_real_escape_string($con, $tpl);
    $ew = mysqli_real_escape_string($con, $ew);
    $bk = mysqli_real_escape_string($con, $bk);



    $q = "UPDATE `user_balance` SET `m_pl`='$mpl',`t_pl`='$tpl',`e_w`='$ew',`b_k`='$bk' WHERE `user_id`='$id'";
    $r = mysqli_query($con, $q);
    if ($r == true) {
        header('location:dashboard.php?stat=1');
    } else {
        header('location:dashboard.php?stat=0');
    }
}

?>
