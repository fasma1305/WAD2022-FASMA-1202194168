<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="modul3fasma";

    $connect = mysqli_connect($host,$user,$password,$db);
    if (!$connect){
        $buka = mysqli_select_db( $db);
        echo "Terhubung";
        if (!$buka) {
            echo "Koneksi gagal";
        }
    }
?>