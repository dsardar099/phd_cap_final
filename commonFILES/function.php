<?php

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function sendmail($to, $subject, $message, $header)
{
    return mail($to, $subject, $message, $header);
}

function getUsers($con)
{
    $q = "SELECT * FROM `userdata` WHERE 1";
    $r = mysqli_query($con, $q);
    $activity = [];
    while ($d = mysqli_fetch_assoc($r)) {
        $id = $d['id'];
        $q1 = "SELECT * FROM `user_balance` WHERE `user_id`='$id'";
        $r1 = mysqli_query($con, $q1);
        $d1 = mysqli_fetch_assoc($r1);
        $cur = array('id' => $d['id'], 'name' => $d['name'], 'email' => $d['email'], 'phone' => $d['phone'], 'gender' => $d['gender'], 'dob' => $d['dob'], 'aadhar' => $d['adhaar'], 'pan' => $d['pan'], 'bname' => $d['b_name'], 'bifsc' => $d['b_ifsc'], 'bacc' => $d['b_acc'], 'mpl' => $d1['m_pl'], 'tpl' => $d1['t_pl'], 'ew' => $d1['e_w'], 'bk' => $d1['b_k']);
        $activity[] = $cur;
    }


    $columns = array_column($activity, 'id');
    array_multisort($columns, SORT_ASC, $activity);
    return $activity;
}

function getAdmin($con,$id)
{
    $q = "SELECT * FROM `admin` WHERE `id`='$id'";
    $r = mysqli_query($con, $q);
    $d = mysqli_fetch_assoc($r);
    return $d;
}
?>