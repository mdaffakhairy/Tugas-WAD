<?php

    //Koneksi Database 
    $server = "localhost:3308";
    $user = "root";
    $password = "";
    $database = "dbcrud_modal";

    //buat koneksi 
    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
