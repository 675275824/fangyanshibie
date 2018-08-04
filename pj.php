<?php
    header("Content-type: text/html;charset=utf-8");
    $pj = $_POST['pingjia'];
    $connect = new mysqli("39.106.142.106", "qq", "13526188121",'app');
    mysqli_query($connect,'set names utf8');
    $sql = "INSERT INTO assess(assess)VALUES('".$pj."')";
    if ($connect->query($sql) === TRUE) {
        $result = array('ok' => 'true');
    } else {
        $result = array('ok' => 'false');
    }
    echo json_encode($result);
    $connect->close();
?>