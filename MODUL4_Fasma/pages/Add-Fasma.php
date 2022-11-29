<?php
    include 'connector.php';
    
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $nama = "fasma_1202194168";

    if(isset($_POST['submit'])){
        $id_mobil = $_POST['id_mobil'];
        $namamobil = $_POST['namamobil'];
        $pemilik = $_POST['pemilik'];
        $mobil = $_POST['mobil'];
        $tgl = $_POST['tgl'];
        $desc= $_POST['desc'];
        $status= $_POST['status'];
        
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext,$ekstensi) ) {
            header("location:Home-fasma.php?alert=gagal-laman");
        }else{	
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../asset/images/'.$rand.'_'.$filename);
            $postEvent = mysqli_query($connect, "INSERT INTO showroom_fasma_table VALUES ('$idmobil', '$namamobil', '$pemilik', '$mobil', '$tgl', '$desc', '$xx','$status')");
            header("location:ListCar-fasma.php");
        }
    }  
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <title>EAD Rent Car</title>

</head>
<body>
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
        <a 
            href="Home-fasma.php"
            class="navbar-brand mb-0 h1">
                <img
                class="d-inline-block align-top"
                src="https://drive.google.com/uc?export=view&id=1hqBNDU1Tx1RKd8wzC1bmnhwBr-7YsK23"
                width="150" height="50" />
        </a>
        <button 
        type="button"
        data-bs-toggle="collapse"
        data-bs-rarget="#navbarNav"
        class="navbar-toggler"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle Navigation"
        >
            <Span class="navbar-toggler-icon"></Span>
        </button>
        
        <div 
        class="collapse navbar-collapse" 
        id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a href="Home-fasma.php" class="nav-link">
                    Home
                </a>
            </li>
            <li class="nav-item active">
                <a href="ListCar-fasma" class="nav-link active">
                    MyCar
                </a>
            </li>
        </ul>
        </div>
    </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <div class="container mt-5 pt-5">
        <div class="card shadow">
            <h3 class="text-center pt-4 fw-bold">Tambah Mobil</h3>
            <form method="post" action="" enctype="multipart/form-data" style="margin-left:15px;margin-right:15px;margin-bottom:15px">
                <div class="mb-3">
                    <label for="namamobil" class="form-label fw-bold">Nama Mobil</label>
                    <input type="text" class="form-control" id="namamobil" name="namamobil" placeholder="Honda Civic">
                </div>
                <div class="mb-3">
                    <label for="pemilik" class="form-label fw-bold">Nama Pemilik</label>
                    <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= $nama ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="mobil" class="form-label fw-bold">Merk</label>
                    <input type="text" class="form-control" id="mobil" name="mobil" placeholder="Honda">
                </div>
                <div class="mb-3">
                    <label for="tgl" class="form-label fw-bold">Tanggal Beli</label>
                    <input type="date" class="form-control" id="tgl" name="tgl">
                <div class="mb-3">
                    <label for="desc" class="form-label fw-bold">Deskripsi</label>
                    <textarea class="form-control" rows="3" cols="30" name="desc" placeholder="Ketikan desc mobil"></textarea>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Foto</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                    </div>
                    <br>
                <div class="mb-3">
                    <label for="status" class="form-label fw-bold">Status Pembayaran</label>
                    <br>
                    <div class="form-check form-check-inline" style="margin-left:15px">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Lunas">
                        <label class="form-check-label" for="inlineRadio1">Lunas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Belum Lunas">
                        <label class="form-check-label" for="inlineRadio2">Belum Lunas</label>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" name="submit">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</body>