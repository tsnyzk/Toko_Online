<?php
    if ($_POST) {
        $id_pelanggan= $_POST['id_pelanggan'];
        $nama= $_POST['nama'];
        $alamat= $_POST['alamat'];
        $telp= $_POST['telp'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $img= $_POST['img'];

        include "koneksi.php";
        if (empty ($password)) {
            $update= mysqli_query ($conn, "UPDATE pelanggan SET nama='".$nama."', alamat='".$alamat."', telp='".$telp."',username='".$username."', img='".$img."' where id_pelanggan='".$id_pelanggan."' ") or die (mysqli_error($conn));
            if($update){
                echo "<script> alert ('Success update profile'); location.href='profile.php' ; </script>";
            }else{
                echo "<script> alert ('Failed update profile'); location.href='profile.php' ; </script>";
            }
        }else {
            $update= mysqli_query ($conn, "UPDATE pelanggan set nama='".$nama."', alamat='".$alamat."', telp='".$telp."', username='".$username."', password='" .md5 ($password)."', img='".$img."' where id_pelanggan='".$id_pelanggan."' ") or die (mysqli_error($conn));
            if ($update) {
                echo "<script> alert ('Success update profile'); location.href='profile.php' ; </script>";  
            }else{
                echo "<script> alert ('Failed update profile'); location.href='profile.php' ; </script>";
            }
        }
    }
?>