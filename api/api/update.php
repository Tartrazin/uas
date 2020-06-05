<?php

require_once('connection.php');

if($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    // Mengambil data
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $negara = $_POST['negara'];
    $email = $_POST['email'];
    $photo = $_POST['photo'];
    $gender = $_POST['gender'];
    $table_presiden = 't_presiden';

    $sql = "UPDATE $table_presiden SET first_name = '$first_name', last_name = '$last_name', negara='$negara', email = '$email', photo = '$photo', gender='$gender' WHERE id = '$id'";
    if(mysqli_query($con, $sql)) {
        $response['value'] = 1;
        $response['message'] = "Data Presiden berhasil diperbaharui";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Data Presiden gagal diperbaharui!!!";
        echo json_encode($response);
    }
    mysqli_close($con);
} else {
    $response['value'] = 0;
    $response['message'] = "Pembaharuan data Presiden gagal, silakan coba kembali!";
    echo json_encode($response);
}
?>