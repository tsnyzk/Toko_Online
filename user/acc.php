<?php
if ($_GET['id_transaksi']) {
    include "koneksi.php";
    $id = $_GET['id_transaksi'];
    $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '".$id."'");
    $data = mysqli_fetch_array($cek);
    if ($data['status'] == "Done") {
        $newstatus = 'Received';
    } 
    else {
        echo "<script>alert('This order has been received to you');</script>";
    }

    $acc= mysqli_query ($conn, "UPDATE transaksi set status='".$newstatus."' where id_transaksi = '".$id."'") or die (mysqli_error($conn));

    if ($acc) {
        echo "<script>alert('Success to send this order');location.href='purchase.php';</script>";
    }
    else{
        echo "<script>alert('Failed to send this order');location.href='purchase.php';</script>";
    }
}
?>