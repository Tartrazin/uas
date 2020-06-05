<?php

require_once('connection.php');

if($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $id = $_POST['id'];
    $table_presiden = 't_presiden';

    $sql = "DELETE FROM $table_presiden WHERE id = '$id'";
    if(mysqli_query($con, $sql)) {
        $response['value'] = 1;
        $response['message'] = "Data Presiden berhasil dihapus";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Data Presiden gagal dihapus!!!";
        echo json_encode($response);
    }
    mysqli_close($con);
}else {
    $response['value'] = 0;
    $response['message'] = "Penghapusan data Presiden gagal, silakan coba kembali!";
    echo json_encode($response);
}
?>