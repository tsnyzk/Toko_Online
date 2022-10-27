<?php
    if ($_POST) {
        $id_petugas= $_POST['id_petugas'];
        $nama_petugas= $_POST['nama_petugas'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $img= $_POST['img'];

        include "koneksi.php";
        if (empty ($password)) {
            $update= mysqli_query ($conn, "UPDATE petugas SET nama_petugas='".$nama_petugas."', username='".$username."', img='".$img."' where id_petugas='".$id_petugas."' ") or die (mysqli_error($conn));
            if($update){
                echo "<script> alert ('Success update profile'); location.href='profile.php' ; </script>";
            }else{
                echo "<script> alert ('Failed update profile'); location.href='profile.php' ; </script>";
            }
        }else {
            $update= mysqli_query ($conn, "UPDATE petugas set nama_petugas='".$nama_petugas."', username='".$username."', password='" .md5 ($password)."', img='".$img."' where id_petugas='".$id_petugas."' ") or die (mysqli_error($conn));
            if ($update) {
                echo "<script> alert ('Success update profile'); location.href='profile.php' ; </script>";  
            }else{
                echo "<script> alert ('Failed update profile'); location.href='profile.php' ; </script>";
            }
        }
    }
?>