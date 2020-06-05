<?php

require_once('connection.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $response = array();
    // Mengambil data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $negara = $_POST['negara'];
    $email = $_POST['email'];
    $photo = $_POST['photo'];
    $gender = $_POST['gender'];
    $table_presiden = 't_presiden';

    //Memeriksa apakah Negara Presiden sudah terdaftar atau belum
    $sql = "SELECT * FROM $table_presiden WHERE negara = '$negara'";
    $check = mysqli_fetch_array(mysqli_query($con, $sql));
    if(isset($check)){
        $response["value"] = 0;
        $response["message"] = "Data dengan Negara $number sudah terdaftar, silakan lakukan pembaharuan data";
        echo json_encode($response);
    } else {
        $sql = "INSERT INTO $table_presiden (first_name, last_name, negara, email, photo, gender) VALUES ('$first_name','$last_name','$negara','$email','$photo','$gender')";
        if(mysqli_query($con, $sql)) {
            $response["value"] = 1;
            $response["message"] = "Sukses menambahkan data Presiden baru";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal menambahkan data Presiden baru";
            echo json_encode($response);
        }
    }

    //tutup konekasi ke basis data
    mysqli_close($con);
} else {
    $response["value"] = 0;
    $response["message"] = "Pendaftaran data Presiden baru gagal, silakan coba lagi!";
    echo json_encode($response);
}
?>