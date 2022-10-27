<?php 
    include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="produk.css">
</head>
<body>
    <div class="row">
        <?php 
        include "koneksi.php";
        $qry_produk = mysqli_query($conn,"select * from produk");
        while($dt_produk=mysqli_fetch_array($qry_produk)){
            ?>
            <div class="col-md-3">
                <div class="card ">
                  <img src="../foto_produk/<?=$dt_produk['foto_produk']?>" class="card-img-top">
                  <div class="card-body" style="height: 300px;">
                    <h5 class="card-title" style="height: 70px;"><?=$dt_produk['nama_produk']?></h5>
                    <p class="card-text deskripsi-produk" style="height: 50px;"><?=substr($dt_produk['deskripsi'], 0,50)?></p>
                    <p class="card-text harga-produk" style="height: 50px;">RP. <?=$dt_produk['harga']?></p>
                    <a href="beli.php?id_produk=<?=$dt_produk['id_produk']?>" class="btn">Buy</a>
                  </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>
