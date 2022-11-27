<?php
require 'Fasma_function.php';

if (isset($_POST["daftar"])){
    
    if(registrasi($_POST)>0){
        echo "<script>
                alert('akun berhasil di daftarkan!'); 
            </script>";
    }else
    echo mysqli_error($conn);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Register</title>
  </head>
  <body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
        <a 
            href="Fasma_firsthome.php"
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
                <a href="Fasma_login.php" class="nav-link">
                    Login
                </a>
            </li>
            <li class="nav-item active">
                <a href="Fasma_Register.php" class="nav-link active">
                    Register
                </a>
            </li>
        </ul>
        </div>  
      </div>
  </nav>
    <!-- End Navbar -->

      <br>
      <br>
  
    <!-- Card Login -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 ">
                   <div class="card  " style="margin-top:70px; width: 28rem;">
                    <div class="card-body p-4">
                            <h4 class="card-title text-center">Register</h4>
                            <hr>
                            <form method="POST" action="">
                                <label for="email"> <b>Email</b></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat E-mail" required>
                                <br>
                                <label for="nama"> <b>Nama</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" required>
                                <br>
                                <label for="no_hp"> <b>Nomor Handphone</b></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone" required>
                                <br>
                                <label for="password"> <b>Kata Sandi</b></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Anda" required>
                                <br>
                                <label for="password2"> <b>Komfirmasi Kata Sandi</b></label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi Anda" required>
                                <br>
                                <br>
                                <center><button type="submit" name="daftar" class="btn btn-primary" style="width: 140px;">Daftar</button></center>
                                <br>
                                <p class="text-center">Anda sudah punya akun? <a href="Fasma_login.php">Login</a></p>
                            </form>       
                    </div>
                </div> 
            </div>
        </div>
    </div>
  <!-- End Card Login  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>