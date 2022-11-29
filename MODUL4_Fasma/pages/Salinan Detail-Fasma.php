<?php
    include 'connector.php';

    $nama = "fasma_1202194168";

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $id_mobil = $_GET['id_mobil'];
    $query = "SELECT * FROM showroom_fasma_table WHERE id_mobil = '$id_mobil'";
    $detail = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($detail);
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
                <a href="Home-fasma.php" class="nav-link active">
                    Home
                </a>
            </li>
            <li class="nav-item active">
                <a href="Add-fasma.php" class="nav-link">
                    MyCar
                </a>
            </li>
        </ul>
        </div>
        <div class="container-fluid">
                <a class="btn btn-primary" href="Add-fasma.php">Add Car</a>
            </div>
    </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <div class="container mt-5 pt-5">
            <div class="card shadow">
                <h3 class="text-center pt-4 fw-bold">DETAIL MOBIL</h3>
                <?php ?>
                    <div style="margin-left:15px;margin-right:15px;margin-bottom:15px" class="text-center">
                        <img class="my-3" src="../asset/images/<?php echo $data['foto_mobil']?>" alt="foto_mobil" class="card-img-top" width="400px">
                        <hr style="border:2px solid blue;width:95%;margin-left:27px">
                    </div>
                    <div style="margin-left:45px;margin-right:15px;margin-bottom:15px">
                        <div class="mb-3">
                            <label for="nama_mobil" class="fw-bold">Nama Mobil:</label>
                            <p><?= $data['nama_mobil']?></p>
                        </div>
                        <div class="mb-3">
                            <label for="pemilik" class="fw-bold">Nama Pemilik:</label>
                            <p><?= $nama?></p>
                        </div>
                        <div class="mb-3">
                            <label for="merk_mobil" class="fw-bold">Merk:</label>
                            <p><?= $data['merk_mobil']?></p>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_beli" class="fw-bold">Tanggal Beli:</label>
                            <p><?= $data['tanggal_beli']?></p>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="fw-bold">Deskripsi:</label>
                            <p><?= $data['deskripsi']?></p>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary col-sm-5" data-bs-toggle="modal" data-bs-target="#sunting">Sunting</button>
                            
                            <button class="btn btn-danger col-sm-5" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>    
                        </div>

                        <div class="modal fade" id="sunting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="ListCar-fasma.php" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="nama_mobil" class="form-label fw-bold">Nama Mobil</label>
                                                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="<?= $data['nama_mobil']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="pemilik" class="form-label fw-bold">Penulis</label>
                                                <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= $nama ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="merk_mobil" class="form-label fw-bold">Merk</label>
                                                <input type="text" class="form-control" id="merk_mobil" name="merk_mobil" value="<?= $data['merk_mobil']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_beli" class="form-label fw-bold">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="<?= $data['tanggal_beli']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                                <textarea class="form-control" rows="3" cols="30" name="deskripsi"> <?= preg_replace('~\x{00a0}~siu', '', $data['deskripsi']); ?> </textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="fw-bold">Foto</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="foto_mobil" name="foto_mobil">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status_pembayaran" class="form-label fw-bold">Status Pembayaran</label>
                                                <div class="form-check form-check-inline" style="margin-left:15px">
                                                    <input class="form-check-input" type="radio" name="status_pembayaran" id="status_pembayaran" value="indonesia" <?php echo ($data['status_pembayaran']=='lunas' ? 'checked' : '');?>>
                                                    <label class="form-check-label" for="inlineRadio1">Lunas</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_pembayaran" id="status_pembayaran" value="lainnya" <?php echo ($data['status_pembayaran']=='belum lunas' ? 'checked' : '');?>>
                                                    <label class="form-check-label" for="inlineRadio2">Belum Lunas</label>
                                                </div>
                                            </div>
            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus list mobil ini ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <a href="delete.php?id_mobil=<?php echo $data['id_mobil']?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php?>
            </div>
     </div>
</body>