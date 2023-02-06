<?php 
  session_start();
  include '../config.php';

  $stringmenu =""; 
  foreach ($fullMenu as $men) {
    $stringmenu .= 
    <<<EOD
    <tr>
      <td class="align-middle">{$men['ID']}</td>
      <td class="align-middle">{$men['MenuType']}</td>
      <td class="align-middle">{$men['Course']}</td>
      <td class="align-middle">{$men['CourseDescription']}</td>
      <td class="align-middle">{$men['CoursePrice']}</td>
      <td class="align-middle"><button class="btn btn-danger rounded-circle">-</button></td>
    </tr>
  EOD;
  }

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
      <td class="align-middle"><button class="btn btn-danger rounded-circle">-</button></td>
    </tr>
  EOD;
  }

  $stringImage = "";
  foreach($images as $image){
    $stringImage .= 
    <<<EOD
    <tr>
      <td class="align-middle">{$image['ID']}</td>
      <td class="align-middle">{$image['ImageName']}</td>
      <td class="align-middle"><img src="../{$image['ImagePath']}" class="img-thumbnail w-25"></td>
      <td class="align-middle">{$image['ImageType']}</td>
      <td class="align-middle"><button class="btn btn-danger rounded-circle">-</button></td>
    </tr>
  EOD;
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
    <title>Backoffice-Sushi-Planet</title>
</head>
<body>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-black navbar-dark py-3 fixed-top">
    <div class="container">
   
      <a href="#welcome" class="navbar-brand">
        <img src="../images/logosushiplanet2white.png" width="200" alt="logo image" class="d-inline-block align-middle">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <button class="rounded"><a href="#" class="nav-link text-dark">Log Out</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="container d-flex flex-column align-items-center justify-center my-5">

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

      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
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
            <tr>
              <td class="align-middle"><?php echo count($contactForm)+1; ?></td>
              <td class="align-middle"><input type="text"></td>
              <td class="align-middle"><input type="text"></td>
              <td class="align-middle"><input type="text"></td>
              <td class="align-middle"><input type="text"></td>
              <td class="align-middle"><textarea type="text"></textarea></td>
              <td class="align-middle"><?php echo date('d-m-y h:i:s'); ?></td>
              <td class="align-middle"><button type="submit" class="btn btn-success rounded-circle">+</button></td>
            </tr>
            <?php echo $stringContact; ?>
          </tbody>
        </table>      
      </div>
 
 
      <div class="tab-pane fade" id="nav-menu" role="tabpanel" aria-labelledby="nav-menu-tab"
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
            <tr>
                <td class="align-middle"><?php echo count($fullMenu)+1; ?></td>
                <td class="align-middle"><input class="" type="text"></td>
                <td class="align-middle"><input class="" type="text"></td>
                <td class="align-middle"><input class="w-100" type="text"></td>
                <td class="align-middle"><input class="w-25" type="text"></td>
                <td class="align-middle"><button type="submit" class="btn btn-success rounded-circle">+</button></td>
              </tr>
              <?php echo $stringmenu; ?>
          </tbody>
        </table>      
      </div>


      <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab"
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
            <tr>
              <td class="align-middle"><?php echo count($images)+1; ?></td>
              <td class="align-middle"><input class="" type="text"></td>
              <td class="align-middle"><input class="" type="file"></td>
              <td class="align-middle"><input class="" type="text"></td>
              <td class="align-middle"><button type="submit" class="btn btn-success rounded-circle">+</button></td>
            </tr>
            <?php echo $stringImage; ?>
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