<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Backoffice-Sushi-Planet</title>
</head>
<body>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-black navbar-dark py-3 fixed-top">
    <div class="container">
   
      <a href="#welcome" class="navbar-brand">
        <img src="images/logosushiplanet2white.png" width="200" alt="logo image" class="d-inline-block align-middle">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <button><a href="#" class="nav-link text-dark">Log Out</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <nav class="mt-5">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
            type="button" role="tab" aria-controls="nav-home" aria-selected="true"><h3>Contact Form</h3></button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Menus</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Images</button>
        </div>
    </nav>
    
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
        tabindex="0">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p><strong>Location: </strong>1-2-3 Kudanshita, Chiyoda-ku, Tokyo 102-0073</p>
            </li>
            <li class="list-group-item">
                <p><strong>Phone: </strong> 080-1111-2222</p>
            </li>
            <li class="list-group-item">
                <p><strong>Email: </strong> user1@example.com</p>
            </li>
            <li class="list-group-item">
                <p><strong>Shedule: </strong></p>
            </li>
        </ul>
    </div>
    
</body>
</html>