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
            // echo "<h1>".$row['Pw'] ."</h1>";
            // echo "<h1>" .password_hash($password, PASSWORD_DEFAULT) . "</h1>";
            if (password_verify($password, $row['Pw'])) {
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
<body class="">
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg bg-black navbar-dark py-3 fixed-top">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../images/logosushiplanet2white.png" width="200" alt="logo image" class="d-inline-block align-middle">
      </a>
    </div>
  </nav>

    <!-- main content  -->
    <section class="py-5 my-5 d-flex flex-column align-items-center justify-center">
        <p class="h2" >Sign In</p>
        <form  class="" method="post" action="" name="login-from">
            <div>
                <label for="user">username</label><br>
                <input class="" type="text" name="username" id="username" placeholder="Enter your Username" required>
            </div>
            <div>
                <label for="password">Password</label><br>
                <input class="" type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div>
                <input class ="" type="submit" name="login" value="Login">
            </div>
        </form>
    </section>
	
</body>
</html>