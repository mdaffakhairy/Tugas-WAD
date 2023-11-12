<?php

//panggil koneksi database
include "koneksi.php"; 

//uji jika tombol simpan di klik 
if(isset($_POST["bsimpan"])) {
 
    //persiapan simpan data baru 
    $simpan = mysqli_query($koneksi, "INSERT INTO tfilm (judul, sutradara, tahun, genre) VALUES (
                                       '$_POST[tjudul]',
                                       '$_POST[tsutradara]',
                                       '$_POST[trilis]',
                                       '$_POST[tgenre]'
                                      )");
    //jika simpan sukses & gagal 
    if($simpan) {
        echo "<script>
            alert('Simpan data sukses!');
            document.location= 'index.php';
        </script>";

    } else {
        echo "<script>
            alert('Simpan data gagal!');
            document.location= 'index.php';
        </script>"; 
    }

}

//uji jika tombol ubah di klik 
if(isset($_POST["bubah"])) {
 
    //persiapan ubah 
    $ubah = mysqli_query($koneksi, "UPDATE tfilm SET
                                                    judul = '$_POST[tjudul]',
                                                    sutradara = '$_POST[tsutradara]',
                                                    tahun = '$_POST[trilis]',
                                                    genre = '$_POST[tgenre]'
                                                WHERE id_film = '$_POST[id_film]'
                                                    ");
    //jika ubah sukses & gagal 
    if($ubah) {
        echo "<script>
            alert('ubah data sukses!');
            document.location= 'index.php';
        </script>";

    } else {
        echo "<script>
            alert(' ubah data gagal!');
            document.location= 'index.php';
        </script>"; 
    }

}

//uji jika tombol hapus di klik 
if(isset($_POST["bhapus"])) {
 
    //persiapan hapus
    $hapus = mysqli_query($koneksi, "DELTE FROM tfilm WHERE id_film = '$_POST[id_film]' ");
                                                   
    if($hapus) {
        echo "<script>
            alert('hapus data sukses!');
            document.location= 'index.php';
        </script>";

    } else {
        echo "<script>
            alert('hapus data gagal!');
            document.location= 'index.php';
        </script>"; 
    }

}