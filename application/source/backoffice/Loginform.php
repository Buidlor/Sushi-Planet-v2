<?php 
    session_start();
    include('../config.php');
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $password = $_POST['password'];
        $check_user = $connection->prepare("SELECT * FROM users WHERE UserName = :user");
        $check_user->bindParam(':user', $user);
        $check_user->execute();
        if ($check_user->rowCount() > 0) {
            $row = $check_user->fetch(PDO::FETCH_ASSOC);
 
            if ($password == $row['Pw']) {
                $_SESSION['user'] = $row['UserName'];
                header("Location: backoffice.php");
            }else{
                echo "Password does not match";
            }
        }else{
            echo "user does not exist";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../images/faviconSushi.png">
	
    <title>Login</title>
</head>
<body class="bg-light">
<!-- navbar  -->
<nav class="navbar navbar-expand-lg bg-black navbar-dark py-3 fixed-top shadow-lg">
    <div class="container">
      <ul class="d-flex justify-center align-items-center navbar-nav ms-auto">
        <li class="nav-item">
          <a href="#welcome" class="navbar-brand">
            <img src="../images/logosushiplanet2white.png" width="200" alt="logo image" class="d-inline-block align-middle">
          </a>
        </li>
        <li>
          <a href="#welcome" class="navbar-brand">
            <h5 class="d-inline-block align-middle fst-italic text-warning">Backoffice</h5>
          </a>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <form method="post">
              <button type="submit" name="logout" class="rounded nav-link text-dark mx-2 btn btn-danger text-white fw-bold">Log Out</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- main content  -->
    <section class="py-5 my-5 d-flex flex-column align-items-center justify-center">
        <p class="h2" >Sign In</p>
        <form  method="post" action="" name="login-from">
            <div class="mb-3">
                <label class="form-label"for="user">Username</label><br>
                <input class="form-control shadow" type="text" name="username" id="username" placeholder="Enter your Username" required>
            </div>
            <div class="mb-3">
                <label class="form-label " for="password">Password</label><br>
                <input class="form-control shadow" type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="mt-4">
                <input class="btn btn-dark shadow" type="submit" name="login" value="Login">
            </div>
        </form>
    </section>
	
</body>
</html>