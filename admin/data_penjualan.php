<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordered</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Kit Font Awesome -->
    <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "header_admin.php";
?>
<br></br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2 mb-3 text-center">Data of Orders<h3>
            <form method="POST" action="data_penjualan.php" class="d-flex">
                <input class="form-control me-2" type="text" name="cari" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form><br>
        </div>
        <div class='card-body'>
            <table class="table table-bordered fs-5 fw-light text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME OF USER</th>
                    <th scope="col">DETAIL PRODUCT</th>
                    <th scope="col">ORDER DATE</th>
                    <th scope="col">ARRIVED DATE</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">PAYMENT TOTAL</th>
                    <th scope="col">HAPUS</th>
                    <th scope="col">STATUS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                global $conn;
                if (isset($_POST["cari"])) {
                    // jika ada keyword pencarian
                    $cari=$_POST['cari'];
                    $query_transaksi= mysqli_query($conn,"SELECT * from transaksi where id_transaksi like '%$cari%' or id_pelanggan like '%$cari%' or tanggal_transaksi like '%$cari%'");
                }else{
                    //jika tidak ada keyword pencarian
                    $query_transaksi= mysqli_query($conn,"SELECT * from transaksi join pelanggan on pelanggan.id_pelanggan= transaksi. id_pelanggan join detail_transaksi on detail_transaksi. id_transaksi=transaksi.id_transaksi join produk on produk. id_produk= detail_transaksi.id_produk  group by nama ORDER BY id_detail_transaksi DESC ") or die (mysqli_error($conn));
                }
                    $no=0;
                    while($data_transaksi=mysqli_fetch_array($query_transaksi)){
                        $no++;
                        $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d JOIN produk p ON p.id_produk = d.id_produk WHERE id_transaksi = '".$data_transaksi['id_transaksi']."' group by nama_produk");
                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?php echo $data_transaksi['nama']; ?></td>
                        <td>
                            <?php
                            while($data_detail = mysqli_fetch_array($query_detail)){
                            ?>
                                <img src="../foto_produk/<?=$data_detail['foto_produk']?>" class="img-fluid rounded-start" width="150px" height="150px" alt="..." >
                                <p><?=$data_detail['nama_produk']?></p>
                            <?php
                            }
                            ?>
                            </td>
                        <td><?php echo $data_transaksi["tgl_transaksi"]; ?></td>
                        <td><?php echo $data_transaksi["tgl_tiba"]; ?></td>
                        <td><?= $data_transaksi["alamat"]; ?></td>
                        <td>
                        <?php
                            include "koneksi.php";
                            $query_bayar = mysqli_query($conn, "SELECT SUM(subtotal) AS total FROM detail_transaksi
                            WHERE id_transaksi = '" . $data_transaksi['id_transaksi'] . "'");
                            $data_bayar = mysqli_fetch_array($query_bayar);
                            echo "<label class='alert alert-secondary'>Rp. ".$data_bayar['total']."</label>";
                            ?>
                        </td>
                        <td><a href="hapus_penjualan.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" onclick="return confirm('Are you sure want to delete this order?')"><i class="fa-solid fa-trash text-red"></i></a> </td>      
                        <?php
                          if ($data_transaksi['status'] == "New"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td><?php
                          elseif ($data_transaksi['status'] == "Confirm"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td>
                                <?php
                          elseif ($data_transaksi['status'] == "Process"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td><?php
                          elseif ($data_transaksi['status'] == "Done"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td><?php
                          elseif ($data_transaksi['status'] == "Received"):
                              ?>
                              <td><div class="alert alert-success" role="alert"><?= $data_transaksi['status'] ?></div>
                          <?php endif; ?>
                              <?php
                              include "koneksi.php";
                              ?>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>