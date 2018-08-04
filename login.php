<?php
$connect = mysqli_connect("39.106.142.106","qq",13526188121,"app");mysqli_query($connect,"set names utf8");$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from `user` where username ='$username'and password ='$password'";
$res = mysqli_query($connect,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}
if(mysqli_num_rows($res)>0)
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


