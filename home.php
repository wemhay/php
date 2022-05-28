<?php
      session_start();
  if (isset($_POST['submit'])) {
      if ($_POST["username"]=="admin" && $_POST["password"]=="admin") {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $POST['password'];
        $_SESSION['auth'] = TRUE;
header("location: admin.php");
}

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .form-wrapper {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .form-wrapper::after {
            content: '';
            position: absolute;
            inset: 0;
            background: url('gapura.jpeg');
            background-position: center;
            background-size: cover;
            filter: blur(5px);
            z-index: -1;
        }

        #form-login {
            width: 50%;
            height: 55%;
            border: 2px solid #121212;
            padding: 2rem;
        }
    </style>

    <title>Document</title>
</head>
<body>
    <div class="form-wrapper w-100 d-flex flex-column">
        <form action="" method="POST" id="form-login" class="form-group bg-dark mb-3" style="width: 30%">
            <div class="input-username d-flex flex-column mb-3">
                <label for="username" class="text-white mb-1">Username</label>
                <input type="text" id="username" name="username" class="form-control bg-secondary"
                    
                >
            </div>
            <div class="input-password d-flex flex-column mb-3">
                <label for="password" class="text-white mb-1">Password</label>
                <input type="password" id="password" name="password" class="form-control bg-secondary">
            </div>
            <!-- <a href="index.php"> -->
            <button type="submit" name="submit" class="btn btn-success w-100 my-3 ">
                Login
            </button>
            <!-- </a> -->
            <button class="btn btn-primary">                
            <a  class="text-white"class="text-center" href="index.php"> 
                Buat KTP
                </button>
            </a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>