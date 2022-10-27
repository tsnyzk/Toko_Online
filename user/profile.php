<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/Givenchypol.png" />
</head>
<body>
    <?php
        include "header.php";
        include "koneksi.php";
        global $conn;
        $query_detail_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan where id_pelanggan = '".$_SESSION['id_pelanggan']."'");
        $data_pelanggan = mysqli_fetch_array($query_detail_pelanggan);
    ?>

    <div class="container content">
        <div class="card-body align-self-center my-5">
        <h3 class="mt-2 mb-3 text-center">Profile</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 align-self-center">
            <img src="img/<?=$data_pelanggan['img']?>" width="80%">
            </div>
            <div class="col-md-8">
                <form action="edit_profile.php?" method="POST">
                    <input type="hidden" name="id_pelanggan" value="<?=$data_pelanggan['id_pelanggan']?>">
                    <!-- nama petugas -->
                    <div class="mb-3">
                         <label class="form-label">Your Name : <?=$data_pelanggan['nama']?></label>
                    </div>
                    <!-- alamat -->
                    <div class="mb-3">
                        <label class="form-label">Address : <?=$data_pelanggan['alamat']?></label>
                    </div>
                    <!-- no.telp -->
                    <div class="mb-3">
                         <label class="form-label">Contact : <?=$data_pelanggan['telp']?></label>
                    </div>
                    <!-- username pelanggan-->
                    <div class="mb-3">
                        <label class="form-label">Username : <?=$data_pelanggan['username']?></label>
                    </div>
                    <input type = "submit" name ="simpan" value ="Edit Profile" class = "btn btn-outline-success">
                </form>
            </div>
        </div>
        </div>
    </div>
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> 
</body>
</html>