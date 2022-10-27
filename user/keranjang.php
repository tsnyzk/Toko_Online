<?php 
    include "header.php";
?>
<h2>Daftar Produk di Keranjang</h2>
<?php
            if (@$_SESSION['cart'] == null) {
                echo "Keranjang kosong";
            }
            else {
                ?>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach (@$_SESSION['cart'] as $key => $value): ?>
            <tr>
                <td><?=($key+1)?></td>
                <td><?=$value['nama_produk']?></td>
                <td><?=$value['qty']?></td>
                <td><a href="hapus_cart.php?id=<?=$key?>" class="btn btn-danger"><strong>X</strong></a></td>
            </tr>
 
        <?php endforeach ?>
    </tbody>
</table>
<a href="cekdata.php" class="btn btn-primary">Check Out</a>
<?php } ?>

