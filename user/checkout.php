<?php
    session_start();
    include "koneksi.php";
    $cart = @$_SESSION['cart'];
    if (count($cart) > 0) {
        $lama_pengiriman = 3;
        $tgl_tiba = date('Y-m-d', mktime(0,0,0,date('m'),date('d')+$lama_pengiriman,date('Y')));

        $tgl_transaksi = date('Y-m-d');
        $query_transaksi = mysqli_query($conn, "INSERT INTO transaksi (id_pelanggan, tgl_transaksi, tgl_tiba, status)
        VALUES ('".$_SESSION['id_pelanggan']."', '".$tgl_transaksi."','".$tgl_tiba."', 'new')") or die(mysqli_error($conn));

        if ($query_transaksi) {
            $id = mysqli_insert_id($conn);
            foreach ($cart as $key => $value) {
                $qty = $value['qty'];
                $harga = $value['harga'];
                $subtotal = $qty*$harga;
                mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal)
                VALUES ('".$id."', '".$value['id_produk']."', '".$qty."', '".$subtotal."')");
            }
            unset($_SESSION['cart']);
            echo "<script>alert('Youre success to checkout this product');location.href='purchase.php'</script>";
        }
        else{
            mysqli_error($conn);
            echo "<script>alert('Youre failed to checkout this product');location.href='keranjang.php'</script>";
        }
    }
?>