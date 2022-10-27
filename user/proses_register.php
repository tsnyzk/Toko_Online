<?php
    $nama = $_POST["nama"];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    include "koneksi.php";
    $input = mysqli_query($conn, "INSERT INTO pelanggan 
    (nama, alamat, telp, username, password) VALUES 
    ('".$nama."', '".$alamat."','".$telp."','".$username."','".md5($password)."')");

    if ($input) {
        echo "<script>alert('Successfully Create A Account');location.href='login.php';</script>";
    }
    else {
        echo "<script>alert('Failed To Create Account');location.href='register.php';</script>";
    }
?>