<?php
    header("Content-type: text/html;charset=utf-8");
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $school = $_POST['school'];
    $birthday = $_POST['birthday'];
    $connect = new mysqli("39.106.142.106", "qq", "13526188121",'app');
    mysqli_query($connect,'set names utf8');
    $sql = "select * from `user` where username ='$username'";
    $res = mysqli_query($connect,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $arr = array('ok'=>"no");
        echo json_encode($arr);
    } else {
        $sql = "INSERT INTO user(username,`password`,school,birthday)VALUES('".$username."','".$password."','".$school."','".$birthday."')";
        $result;
        if ($connect->query($sql) === TRUE) {
            $result = array('ok' => 'true');
        } else {
            $result = array('ok' => 'false');
        }
        echo json_encode($result);
    }
    $connect->close();
 ?>