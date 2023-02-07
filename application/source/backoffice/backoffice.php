<?php 
  session_start();
  include '../config.php';

  // Check if the user is logged in
  if (!isset($_SESSION['user'])) {
    header("Location: Loginform.php");
    exit();
  }

  

  // Creates the tablerows for the menu and insert it in a string
  $stringmenu =""; 
  $index = 0;
  foreach ($fullMenu as $men) {
    $stringmenu .= 
    <<<EOD
    <tr>
      <td class="align-middle">{$men['ID']}</td>
      <td class="align-middle">{$men['MenuType']}</td>
      <td class="align-middle">{$men['Course']}</td>
      <td class="align-middle">{$men['CourseDescription']}</td>
      <td class="align-middle">{$men['CoursePrice']}€</td>
      <td class="align-middle"><button type="submit" name="removeMenu[{$index}]" class="btn btn-danger rounded-circle"><i class="fa-solid fa-minus"></i></button></td>
    </tr>
  EOD;
  $index++;
  }

  
  // Remove a menu item from the database
  $index = 0;
  if (isset($_POST['removeMenu'])) {
    // Get the index of the menu item to remove
    $index = key($_POST['removeMenu']);
 
    $sql = "DELETE FROM menu WHERE ID = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['id' => $fullMenu[$index]['ID']]);

    // Remove the menu item from the $fullMenu array
    unset($fullMenu[$index]);
  
    // Re-index the $fullMenu array
    $fullMenu = array_values($fullMenu);
    $index = 0;

    $_SESSION['active_tab'] = 'nav-menu';

    // Redirect to prevent resubmission
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
  }

  // Creates the tablerows for the contactform and insert it in a string
  $index = 0;
  $stringContact ="";
  foreach ($contactForm as $contact) {
    $stringContact .= 
    <<<EOD
    <tr>
      <td class="align-middle">{$contact['ID']}</td>
      <td class="align-middle">{$contact['FirstName']}</td>
      <td class="align-middle">{$contact['SurName']}</td>
      <td class="align-middle">{$contact['Email']}</td>
      <td class="align-middle">{$contact['Subject']}</td>
      <td class="align-middle">{$contact['Message']}</td>
      <td class="align-middle">{$contact['Date']}</td>
      <td class="align-middle"><button type="submit" name="removeContact[{$index}]" class="btn btn-danger rounded-circle"><i class="fa-solid fa-minus"></i></button></td>
    </tr>
  EOD;
  $index++;
  }

  //removes contact from database
  if (isset($_POST['removeContact'])) {
    // Get the index of the contact item to remove
    $index = key($_POST['removeContact']);
    
    $sql = "DELETE FROM contactform WHERE ID = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['id' => $contactForm[$index]['ID']]);

    // Remove the contact item from the $contactForm array
    unset($contactForm[$index]);
  
    // Re-index the $contactForm array
    $contactForm = array_values($contactForm);
    $index = 0;

    $_SESSION['active_tab'] = 'nav-home';

    // Redirect to prevent resubmission
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
  }

  // Creates the tablerows for the images and insert it in a string
  $index = 0;
  $stringImage = "";
  foreach($images as $image){
    $stringImage .= 
    <<<EOD
    <tr>
      <td class="align-middle">{$image['ID']}</td>
      <td class="align-middle">{$image['ImageName']}</td>
      <td class="align-middle"><img src="../{$image['ImagePath']}" class="img-thumbnail w-25"></td>
      <td class="align-middle">{$image['ImageType']}</td>
      <td class="align-middle"><button type="submit" name="removeImage[{$index}]" class="btn btn-danger rounded-circle"><i class="fa-solid fa-minus"></i></button></td>
    </tr>
  EOD;
  $index++;
  }

  //removes image from database
  $index=0;
  if (isset($_POST['removeImage'])) {
    // Get the index of the image item to remove
    $index = key($_POST['removeImage']);
    
    $sql = "DELETE FROM images WHERE ID = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['id' => $images[$index]['ID']]);

    // Remove the image item from the $images array
    unset($images[$index]);
  
    // Re-index the $images array
    $images = array_values($images);
    $index = 0;

    $_SESSION['active_tab'] = 'nav-image';

    // Redirect to prevent resubmission
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
  }

  //adds contact to database
  if(isset($_POST['addContact']))
  {
    $sql = "INSERT INTO contactform (FirstName, SurName, Email, Subject, Message, Date) VALUES (:FirstName, :SurName, :Email, :Subject, :Message, NOW())";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['FirstName' => $_POST['FirstName'], 'SurName' => $_POST['SurName'], 
    'Email' => $_POST['Email'], 'Subject' => $_POST['Subject'], 'Message' => $_POST['Message']]);
       
    $_SESSION['active_tab'] = 'nav-home';
    
    // Redirect to prevent resubmission      
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
  }

  //adds menu item to database
  if(isset($_POST['addMenu']))
  {
    $sql = "INSERT INTO menu (MenuType, Course, CourseDescription, CoursePrice) VALUES (:MenuType, :Course, :CourseDescription, :CoursePrice)";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['MenuType' => $_POST['MenuType'], 'Course' => $_POST['Course'], 
    'CourseDescription' => $_POST['CourseDescription'], 'CoursePrice' => $_POST['CoursePrice']]);
       // Redirect to prevent resubmission

       $_SESSION['active_tab'] = 'nav-menu';

    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
  }

  //adds image to database
  if(isset($_POST['addImage']))
  {

    if(isset($_FILES['ImagePath'])){
    
      
      $errors= array();
      $file_name = $_FILES['ImagePath']['name'];
      $file_size =$_FILES['ImagePath']['size'];
      $file_tmp =$_FILES['ImagePath']['tmp_name'];
      $file_type=$_FILES['ImagePath']['type'];
      $temp = explode('.',$file_name);
      $file_ext=strtolower($temp[count($temp)-1]);
      $sql = "INSERT INTO images (ImageName, ImagePath, ImageType) VALUES (:ImageName, :ImagePath, :ImageType)";
      $stmt = $connection->prepare($sql);
      $stmt->execute(['ImageName' => $_POST['ImageName'], 'ImagePath' => "images/" . $file_name, 
      'ImageType' => $_POST['ImageType']]);

      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="<br><br>extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='<br><br>File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../images/".$file_name);
      }else{
          print_r($errors);
      }
    }

    $_SESSION['active_tab'] = 'nav-image';

    // Redirect to prevent resubmission
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
  }



  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: loginform.php");
    exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" href="../images/faviconSushi.png">  
    <title>Backoffice-Sushi-Planet</title>
</head>
<body>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-black navbar-dark py-3 fixed-top">
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

  <section class="container d-flex flex-column align-items-center justify-center my-5" id="welcome">

    <nav class="my-2">
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
        type="button" role="tab" aria-controls="nav-home" aria-selected="true"><h4>Contact Form</h4></button>
        <button class="nav-link" id="nav-menu-tab" data-bs-toggle="tab" data-bs-target="#nav-menu"
        type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><h4>Menus</h4></button>
        <button class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image"
        type="button" role="tab" aria-controls="nav-image" aria-selected="false"><h4>Images</h4></button>
      </div>
    </nav>
    
    <div class="tab-content" id="nav-tabContent">
        <!-- show active -->
      <div class="tab-pane fade <?php echo (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'nav-home') ? 'show active' : ''; ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
        tabindex="0">
        <table class = "table table-striped">
          <thead>
            <tr >
              <th class = "fs-5 pe-5">#</th>
              <th class = "fs-5 pe-5">Name</th>
              <th class = "fs-5 pe-5">SurName</th>
              <th class = "fs-5 pe-5">Email</th>
              <th class = "fs-5 pe-5">Subject</th>
              <th class = "fs-5 pe-5">Message</th>
              <th class = "fs-5 pe-5">Date</th>
              <th class = "fs-5 pe-5">Action</th>
            </tr>
          </thead>
          <tbody>
 
            <form method="post">
              <tr>
                <td class="align-middle"><output class="form-control">ID</output></td>
                <td class="align-middle"><input name="FirstName" class="form-control" type="text"></td>
                <td class="align-middle"><input name="SurName" class="form-control" type="text"></td>
                <td class="align-middle"><input name="Email" class="form-control" type="email" ></td>
                <td class="align-middle"><input name="Subject" class="form-control" type="text"></td>
                <td class="align-middle"><textarea name="Message" class="form-control" type="text"></textarea></td>
                <td class="align-middle"><output name="Date" class=""><?php echo date('d-m-y h:i:s'); ?></output></td>
                <td class="align-middle"><button type="submit" name="addContact" class="btn btn-success rounded-circle"><i class="fa-solid fa-plus"></i></button></td>
              </tr>
              <?php echo $stringContact; ?>
            </form>
          </tbody>
        </table>      
      </div>
 
 
      <div class="tab-pane fade <?php echo (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'nav-menu') ? 'show active' : ''; ?>" id="nav-menu" role="tabpanel" aria-labelledby="nav-menu-tab"
        tabindex="0">
        <table class = "table table-striped">
          <thead>
            <tr >
              <th class = "fs-5 pe-5">#</th>
              <th class = "fs-5 pe-5">MenuType</th>
              <th class = "fs-5 pe-5">Course</th>
              <th class = "fs-5 pe-5">CourseDescription</th>
              <th class = "fs-5 pe-5">CoursePrice</th>
              <th class = "fs-5 pe-5">Action</th>
            </tr>
          </thead>
          <tbody>
            <form method="post">
              <tr>
                  <td class="align-middle"><output class="form-control">ID</td>
                  <td class="align-middle"><input name="MenuType" class="form-control" type="text"></td>
                  <td class="align-middle"><input name="Course" class="form-control" type="text"></td>
                  <td class="align-middle"><input name="CourseDescription" class="form-control w-100" type="text"></td>
                  <td class="align-middle"><input name="CoursePrice" class="form-control w-50" type="number" placeholder="€"></td>
                  <td class="align-middle"><button type="submit" name="addMenu" class="btn btn-success rounded-circle"><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <?php echo $stringmenu; ?>
            </form>
          </tbody>
        </table>      
      </div>


      <div class="tab-pane fade <?php echo (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'nav-image') ? 'show active' : ''; ?> " id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab"
        tabindex="0">
        <table class = "table table-striped">
          <thead>
            <tr >
              <th class = "fs-5 pe-5">#</th>
              <th class = "fs-5 pe-5">ImageName</th>
              <th class = "fs-5 pe-5">Image</th>
              <th class = "fs-5 pe-5">Description</th>
              <th class = "fs-5 pe-5">Action</th>
            </tr>
          </thead>
          <tbody>
            <form method="post" enctype="multipart/form-data">
              <tr>
                <td class="align-middle"><output class="form-control">ID</output></td>
                <td class="align-middle"><input name="ImageName" class="form-control" type="text"></td>
                <td class="align-middle"><input name="ImagePath" class="form-control w-75" type="file"></td>
                <td class="align-middle"><input name="ImageType" class="form-control" type="text"></td>
                <td class="align-middle"><button type="submit" name="addImage" class="btn btn-success rounded-circle"><i class="fa-solid fa-plus"></i></button></td>
              </tr>
              <?php echo $stringImage; ?>
            </form>
          </tbody>
        </table>      
      </div>
        
    </div>
  </section>
          
  <!-- bootstrap script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script>
</body>
</html>