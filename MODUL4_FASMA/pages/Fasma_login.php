    <?php
    session_start();
    require 'Fasma_function.php';

    //cek ada cookie?
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn,"SELECT email FROM user_Fasma WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if ($key === hash('sha256', $row['email'])) {
            $_SESSION['logon'] = true;
        }

    }


    if (isset($_SESSION["login"])) {
        header("Location: Home-Fasma.php");
        exit;
    }


    if (isset ($_POST["login"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user_Fasma WHERE email = '$email'");

        // cek username
        if (mysqli_num_rows($result) === 1) {


            // cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]) ){
                // set session
                $_SESSION["login"] = true;
                $_SESSION["id"]=$row["id"];

                //cek remember me
                if (isset($_POST["remember"])) {
                    // Buat COOKIE

                    setcookie('id', $row['id'], time()+3600);
                    setcookie('key', hash('sha256',$row['email']), time()+3600);
                }


                echo "
                <script>
                    alert('Anda Berhasil Login');
                    document.location.href='Home-Fasma.php';
                </script>
                ";
                exit;
            }

        }

        $error = true;
        if (isset($error)) {
            echo "<script>
                    alert('username atau password salah'); 
                </script>";
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

        <title>Login</title>
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
                <a href="Fasma_login.php" class="nav-link active">
                    Login
                </a>
            </li>
            <li class="nav-item active">
                <a href="Fasma_Register.php" class="nav-link">
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
                                <h4 class="card-title text-center">Login</h4>
                                <hr>
                                <form method="POST" action="">
                                    <label for="email"> <b>Email</b></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat E-mail">
                                    <br>
                                    <label for="password"> <b>Kata Sandi</b></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Anda">
                                    <br>
                                    <input type="checkbox" name="remember" id="remember">                
                                    <label for="remember">Remember Me </label>
                                    <br><br>
                                    <center><button type="submit" name="login" class="btn btn-primary" style="width: 140px;">Login</button></center>
                                    <br>
                                    <p class="text-center">Anda belum punya akun? <a href="Fasma_register.php">Register</a></p>
                                </form>       
                        </div>
                    </div> 
                </div>
            </div>`
        </div>
      <!-- End Card Login  -->




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


      </body>
    </html>
