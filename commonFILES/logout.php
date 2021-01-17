<?php
session_start();
include_once('../db_file/db_conn.php');
function logout($url, $conn)
{
    //$stat = upop($_SESSION['uid'], "LogOut", $conn);
    session_unset();
    session_destroy();
    header("Location:$url");
}

if (isset($_SESSION['type'])){
    if($_SESSION['type']=="admin")
    {
        $url="../phd_admin/index.php";
    }
    else if($_SESSION['type']=="user")
    {
        $url="../signin.php";
    }
    logout($url,$con);
}
else{
    header("Location:../signin.php");
}
?>