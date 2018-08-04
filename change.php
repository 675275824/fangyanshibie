<?php
    $connect = mysqli_connect("39.106.142.106","qq",13526188121,"app");
    $username = $_POST['username'];
    $opassword = $_POST['old_password'];
    $npassword = $_POST['new_password'];
    $sql = "update user set password =".$npassword." where(username='".$username."' and password='".$opassword."')";
    mysqli_query($connect,'set names utf8');
    $res = mysqli_query($connect,$sql);
    if($res == true)
    {
        $arr = array('ok'=>"true");
        echo json_encode($arr);
    }
    else
    {
        $arr = array("ok"=>"false");
        echo json_encode($arr);
    }
?>


