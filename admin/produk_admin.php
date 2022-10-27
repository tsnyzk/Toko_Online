<?php
include "header_admin.php";
global $conn;
?>

<div class="row" style="width: 90%; display:flex; justify-content: center; align-items: center; margin: 0 auto; ">
    <?php
    include "../user/koneksi.php";
    $qry_produk = mysqli_query($conn, "select * from produk");
    while ($dt_produk = mysqli_fetch_array($qry_produk)) {
        ?>
        <h3 style="margin-top: 30px;">Tampil produk </h3> 
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th> 
                <th>FOTO produk</th> 
                <th>NAMA produk</th>
                <th>KATEGORI</th>
                <th>DESKRIPSI</th>
                <th>HARGA</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "../user/koneksi.php";
            $qry_produk=mysqli_query($conn,"select * from produk");
            $no=0;
            while($data_produk=mysqli_fetch_array($qry_produk)){
            $no++;
            ?>
            <tr>              
                <td><?=$no?></td>
                <td><img src="../foto_produk/<?= $data_produk["foto"];?>" width="50px"></td>
                <td><?=$data_produk['nama_produk']?></td> 
                <td><?=$data_produk['pengarang']?></td> 
                <td><?=$data_produk['deskripsi']?></td>
                <td><a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Ubah</a> | <a href="hapus_produk.php?id_produk=<?=$data_produk['id_produk']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

            </tr>
            <?php 
            } 
            ?>
        </tbody>
    </table>

        <?php
    }
    ?>
    <div class="mt-3">
        <a href="tambah_produk.php" class="btn btn-primary mb-5 ms-2">+ Tambah produk</a>
    </div>
</div>