<?php
if ($_GET['id_transaksi']) {
    include "koneksi.php";
    global $conn;
    $qry_hapus=mysqli_query($conn, "delete from detail_transaksi where id_transaksi='".$_GET['id_transaksi']."'");
    if ($qry_hapus) {
        echo "<script>alert ('Success delete this order'); location.href='data_penjualan.php';</script>";
    }else {
        echo "<script>alert ('Failed delete this order'); location.href='data_penjualan.php';</script>";
    }
}
?>