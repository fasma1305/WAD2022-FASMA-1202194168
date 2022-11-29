  <?php
  session_start();

  require 'fasma_function.php';

  if (!isset($_SESSION["login"])) {
    header("Location: fasma_login.php");
    return false;

  }else{
    $id=$_SESSION["id"];
    $result=mysqli_query($conn, "SELECT * FROM user_fasma WHERE id = '$id'");
    $row =mysqli_fetch_assoc($result);
    $nama=$row["nama"];


  }
    if(isset($_POST["simpan"])) {
        if(ubahuser($_POST)>0){
            echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href='Home-fasma.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('data gagal diubah');
                document.location.href='fasma_profile.php';
            </script>
            ";
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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


      <title>Home</title>
    </head>
    <body>
    <!-- Navbar -->
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fas fa-user-edit"></i> &nbsp; <?= $nama; ?>
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-primary" href="fasma_profile.php"><i class="far fa-user"></i>&nbsp; Profile</a></li>
                    <li><a class="dropdown-item text-primary" href="fasma_logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a></li>
                </ul>
            </li>
        </ul>
        </div>
        
      </div>
    </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- End Navbar -->

<br>
<br>

    <!-- Card Login -->
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-10 ">
                     <div class="card  " style="margin-top:70px; width: 100%;">
                      <div class="card-body p-4">
                              <h4 class="card-title text-center">Profile</h4>
                              <br>
                              <form method="POST" action="">
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                 <div class="mb-3 row">
                                      <label for="staticEmail" class="col-sm-3 col-form-label"><b>Email</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $row['email']?>">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="nama" class="col-sm-3 col-form-label"><b>Nama</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']?>">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="no_hp" class="col-sm-3 col-form-label"><b>Nomor Handphone</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $row['no_hp']?>">
                                      </div>
                                  </div>
                                  <hr>
                                  <div class="mb-3 row">
                                      <label for="password" class="col-sm-3 col-form-label"><b>Kata Sandi</b></label>
                                      <div class="col-sm-9">
                                      <input type="password" class="form-control" id="password" name="password">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="password2" class="col-sm-3 col-form-label"><b>Konfirmasi Kata Sandi</b></label>
                                      <div class="col-sm-9">
                                      <input type="password" class="form-control" id="password2" name="password2">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="navbar" class="col-sm-3 col-form-label"><b>Warna Navbar</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" id="navbar">
                                      </div>
                                  </div>
                                  <Center> <button type="submit" name="simpan" class="btn btn-primary" style= "width:140px">Simpan</button>
                                  &emsp;
                                 <a href="Home-fasma.php" class="btn btn-danger" style="width:140px">Cancel</a></Center>
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
