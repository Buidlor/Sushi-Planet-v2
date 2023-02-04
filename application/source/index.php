<?php 
  session_start();
  include ('config.php');

  
  
  if (isset($_POST['submit'])) {
		$FirstName = $_POST['FirstName'];
    $SurName = $_POST['SurName'];
		$Email = $_POST['Email'];
		$Subject = $_POST['Subject'];
		$Message = $_POST['Message'];

	
    $insert = $connection->prepare("INSERT INTO contactform (FirstName, SurName, Email, Subject, Message, Date) VALUES (:FirstName, :SurName, :Email, :Subject, :Message, NOW())");
    $insert->bindParam(':FirstName', $FirstName);
    $insert->bindParam(':SurName', $SurName);
    $insert->bindParam(':Email', $Email);
    $insert->bindParam(':Subject', $Subject);
    $insert->bindParam(':Message', $Message);
    try {
      $insert->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    
  }	
				
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="icon" href="images/faviconSushi.png">
  <title>Sushi Planet</title>
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
            <a href="#welcome" class="nav-link">Welcome</a>
          </li>
          <li class="nav-item">
            <a href="#menu" class="nav-link">Menu</a>
          </li>
          <li class="nav-item">
            <a href="#pictures" class="nav-link">Pictures</a>
          </li>
          <li class="nav-item">
            <a href="#restaurants" class="nav-link">Restaurants</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Welcome -->
  <section class="bg-dark text-light pt-4 pb-3" id="welcome">
    <div class="container">
      <header class="pb-3 mb-2">
        <h1>Welcome to Sushi Planet</h1>
      </header>

      <div class="p-5 mb-4 bg-light text-dark rounded-3">

        <div id="slides" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators mb-0">
            <button type="button" data-bs-target="#slides" data-bs-slide-to="0" class="active" aria-current="true"
              aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#slides" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#slides" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="d-sm-flex align-items-center justify-content-around">
                <div class="px-2">
                  <h2 class="fw-bold">News</h2>
                  <p>A new sushi restaurant has opened in the heart of the city, attracting patrons
                    with its
                    delectable menu and unique atmosphere. Owner and chef, Hiroshi Fujisawa, brings
                    over 30 years of
                    sushi-making experience to the restaurant. Fujisawa personally selects the
                    freshest fish and
                    other ingredients for his creations, which include both traditional and
                    innovative rolls,
                    nigiri, and sashimi. Diners also can enjoy a variety of other dishes, like
                    ramen, crab cakes,
                    tempura, and katsu.
                  </p>
                </div>
                <img class="img-fluid w-25 d-none d-sm-block" src="images/chef2.jpg" alt="chef picture" />
              </div>
            </div>
            <div class="carousel-item">
              <div class="d-sm-flex align-items-center justify-content-between">

                <div class="px-2">
                  <h2 class="fw-bold">Event</h2>
                  <p>A sushi restaurant in town is hosting a special event: free sushi rolls for
                    everyone! They are offering a wide selection of traditional sushi rolls, as well
                    as some special rolls using unusual ingredients like squid ink and yuzu.
                    Attendees will get to try all sorts of different flavors and textures. The chef
                    will even be on-hand to answer questions about the different sushi types,
                    ingredients, and techniques. And of course, there will be plenty of sake and
                    green tea available to go with your sushi!
                  </p>
                </div>
                <img class="img-fluid w-25 d-none d-sm-block" src="images/sushiplate.jpg" alt="chef picture" />
              </div>
            </div>
            <div class="carousel-item">
              <div class="d-sm-flex align-items-center justify-content-between">

                <div class="px-2">
                  <h2 class="fw-bold">Promotion</h2>
                  <p>Welcome to our sushi promotion! From now until December 20th, we invite you to
                    come and enjoy our delicious selection of sushi at special discounted prices.
                    Choose from a vast range of classic and modern flavors, freshly prepared by our
                    experienced sushi chefs. Try something you've never had before and discover the
                    intriguing world of sushi!
                  </p>
                </div>
                <img class="img-fluid w-25 d-none d-sm-block" src="images/sushipromo.jpg" alt="chef picture" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- menu  -->
  <section class="py-3" id="menu">
    <div class="container mt-5">
      <h2 class="text-center mb4 pb-4">Dining card</h2>

      <!-- menu drinks -->
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingZero">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseZero" aria-expanded="false" aria-controls="flush-collapseZero">
              <h5>Drinks</h5>
            </button>
          </h2>
          <div id="flush-collapseZero" class="accordion-collapse collapse" aria-labelledby="flush-headingZero"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-group list-group-flush">
                <?php echo $stringDrinks;?>
              </ul>
            </div>
          </div>
        </div>

        <!-- menu Appetizers -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <h5>Appetizers <span class="badge bg-info rounded-pill"> new ! </span> </h5>
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-group list-group-flush">
                <?php echo $stringAppetizers;?>
              </ul>
            </div>
          </div>
        </div>

        <!-- menu Starters -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              <h5>Starters</h5>
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-group list-group-flush">
                <?php echo $stringStarters;?>
              </ul>
            </div>
          </div>
        </div>

        <!-- menu Main course -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              <h5>Main course</h5>
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-group list-group-flush">
                <?php echo $stringMains;?>
              </ul>
            </div>
          </div>
        </div>

        <!-- menu Desserts -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseDes" aria-expanded="false" aria-controls="flush-collapseDes">
              <h5>Desserts</h5>
            </button>
          </h2>
          <div id="flush-collapseDes" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-group list-group-flush">
                <?php echo $stringDesserts;?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- picture galery -->
  <section class="bg-dark pb-5" id="pictures">
    <div class="container py-4">
      <h2 class="text-light text-center">Pictures galery</h2>
    </div>
    
    <div id="gals" class="carousel slide mx-3" data-bs-ride="false">
      
      
      <nav aria-label="..." class="d-flex justify-content-center pb-3">
        <ul class="pagination pagination-sm">
          <?php echo $imagePages; ?>
        </ul>
      </nav>
      
      

      <div class="container carousel-inner">
        <?php echo $innerCarousel; ?>
        
        <div class="carousel-item active">
          <div class="row g-5 pb-5 ">
            <div class="col-sm-6 col-md-3">
              <img src="<?php echo $images[1]['ImagePath'] ?>" alt="image of chef" class="img-fluid">
            </div>
            <div class="col-sm-6 col-md-3">
              <img src="images/restaurant2.png" alt="image of chef" class="img-fluid">
            </div>
            <div class="col-sm-6 col-md-3">
              <img src="images/sushi1.png" alt="image of chef" class="img-fluid">
            </div>
            <div class="col-sm-6 col-md-3">
              <img src="images/restaurant.png" alt="image of chef" class="img-fluid">
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </section>
  
  <!-- franchise Restaurants -->
  <section class="py-5" id="restaurants">

    <div class="container">
      <div class="row g-4">

        <div class="col-md">
          <h2 class="text-center mb-4">Restaurant Info</h2>
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sakura Sushi</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Mikado Sushi Bar</button>
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Wasabi Fusion</button>
              <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled"
                type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Koi Sushi Lounge</button>
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
                  <ul class="ms-4">
                    <li>Monday: Open from 9:00 AM to 5:00 PM</li>
                    <li>Tuesday: Open from 9:00 AM to 5:00 PM</li>
                    <li>Wednesday: Open from 9:00 AM to 5:00 PM</li>
                    <li>Thursday: Open from 9:00 AM to 5:00 PM</li>
                    <li>Friday: Open from 9:00 AM to 5:00 PM</li>
                    <li>Saturday: Closed</li>
                    <li>Sunday: Closed</li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <p><strong>Location: </strong>4-5-6 Minato-ku, Osaka-shi, Osaka 542-0081</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Phone: </strong> 090-3333-4444</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Email: </strong> user2@example.com</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Shedule: </strong></p>
                  <ul class="ms-4">
                    <li>Monday: Open from 10:00 AM to 6:00 PM</li>
                    <li>Tuesday: Open from 10:00 AM to 6:00 PM</li>
                    <li>Wednesday: Closed</li>
                    <li>Thursday: Open from 10:00 AM to 6:00 PM</li>
                    <li>Friday: Open from 10:00 AM to 6:00 PM</li>
                    <li>Saturday: Closed</li>
                    <li>Sunday: Closed</li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <p><strong>Location: </strong>7-8-9 Shinjuku-ku, Yokohama-shi, Kanagawa 220-0011</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Phone: </strong> 070-5555-6666</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Email: </strong> user3@example.com</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Shedule: </strong></p>
                  <ul class="ms-4">
                    <li>Monday: Open from 11:00 AM to 7:00 PM</li>
                    <li>Tuesday: Closed</li>
                    <li>Wednesday: Open from 11:00 AM to 7:00 PM</li>
                    <li>Thursday: Closed</li>
                    <li>Friday: Open from 11:00 AM to 7:00 PM</li>
                    <li>Saturday: Closed</li>
                    <li>Sunday: Closed</li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab"
              tabindex="0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <p><strong>Location: </strong>10-11-12 Setagaya-ku, Nagoya-shi, Aichi 461-0003</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Phone: </strong> 060-7777-8888</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Email: </strong> user4@example.com</p>
                </li>
                <li class="list-group-item">
                  <p><strong>Shedule: </strong></p>
                  <ul class="ms-4">
                    <li>Monday: Closed</li>
                    <li>Tuesday: Open from 12:00 PM to 8:00 PM</li>
                    <li>Wednesday: Closed</li>
                    <li>Thursday: Open from 12:00 PM to 8:00 PM</li>
                    <li>Friday: Closed</li>
                    <li>Saturday: Open from 12:00 PM to 8:00 PM</li>
                    <li>Sunday: Closed</li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>

        </div>

        <div class="col-md">

          <div class="mt-5 map-area">
            <iframe src="https://www.google.com/maps/d/embed?mid=1adD58jCwwXlDxMOQzqXM0BsA9BpFOo8&ehbc=2E312F"
              width="100%" height="480"></iframe>
          </div>
        </div>
      </div>
    </div>

  </section>



  <!-- contact form -->
  <section class="bg-primary pb-5" id="contact">

    <div class="container text-light py-5">
      <h2 class="text-center mb-3">Contact</h2>

      <form method="post">
        <div class="row">
          <!-- name and Email -->
          <div class="container col-md">
            <div class="d-flex ">
              <div class="mb-3 me-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" id="inputName" name="FirstName" class="form-control" aria-describedby="passwordHelpInline"
                  placeholder="John">
              </div>
              <div class="mb-3">
                <label for="inputSurname" class="form-label">Surname</label>
                <input name="SurName" type="text" id="inputSurname" class="form-control" aria-describedby="passwordHelpInline"
                  placeholder="Smith">
              </div>
            </div>
            <div class="mb-3">
              <label for="inputEmail" class="col-form-label">Email</label>
              <input name="Email" type="Email" id="inputEmail" class="form-control" aria-describedby="passwordHelpInline"
                placeholder="john.smith@smthing.som">
            </div>
          </div>

          <!-- subject and message  -->
          <div class="container col-md">
            <label for="subject" class="form-label">Subject</label>
            <select name="Subject" class="form-select mb-3" id="subject" aria-label="select option">
              <option selected>Select restaurant</option>
              <option value="All restaurants">All restaurants</option>
              <option value="Sakura Sushi">Sakura Sushi</option>
              <option value="Mikado Sushi Bar">Mikado Sushi Bar</option>
              <option value="Wasabi Fusion">Wasabi Fusion</option>
              <option value="Koi Sushi Lounge">Koi Sushi Lounge</option>
            </select>

            <label for="message" class="form-label">Message</label>
            <textarea name="Message" class="form-control" id="message" class="form-control" aria-describedby="messageHelp"
              placeholder="insert message here"></textarea>
          </div>

        </div>
        <div class="text-center mt-3">

          <button name="submit" type="submit" class="btn btn-dark btn-lg mt-2">Submit</button>
        </div>

      </form>

    </div>

    <!-- Managers -->
    <div class="container">
      <h2 class="text-center text-white pb-3">Branch Managers</h2>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="pictures of sources"
                class="rounded-circle mb3" />
              <h3 class="card-tirle mb-3">Joey Shultz</h3>
              <ul class="list-group list-group-flush pb-2">
                <li class="list-group-item">06123456 </li>
                <li class="list-group-item">Joe.shultz@sp.co</li>
                <li class="list-group-item">Sakura Sushi</li>
              </ul>
              <a href="#"><i class="fa-brands fa-twitter text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-github text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-discord text-dark"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/men/69.jpg" alt="pictures of sources"
                class="rounded-circle mb3" />
              <h3 class="card-tirle mb-3">Bart Bloke</h3>
              <ul class="list-group list-group-flush pb-2">
                <li class="list-group-item">06323456 </li>
                <li class="list-group-item">Bart.bloke@sp.co</li>
                <li class="list-group-item">Mikado Sushi Bar</li>
              </ul>
              <a href="#"><i class="fa-brands fa-twitter text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-github text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-discord text-dark"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="pictures of sources"
                class="rounded-circle mb3" />
              <h3 class="card-tirle mb-3">Elise Smith</h3>
              <ul class="list-group list-group-flush pb-2">
                <li class="list-group-item">06123956 </li>
                <li class="list-group-item">Elise.Smith@sp.co</li>
                <li class="list-group-item">Wasabi Fusion</li>
              </ul>
              <a href="#"><i class="fa-brands fa-twitter text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-github text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-discord text-dark"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="pictures of sources"
                class="rounded-circle mb3" />
              <h3 class="card-tirle mb-3">Caro Henri</h3>
              <ul class="list-group list-group-flush pb-2">
                <li class="list-group-item">06183456 </li>
                <li class="list-group-item">Caro.henri@sp.co</li>
                <li class="list-group-item">Koi Sushi Lounge</li>
              </ul>
              <a href="#"><i class="fa-brands fa-twitter text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-github text-dark"></i></a>
              <a href="#"><i class="fa-brands fa-discord text-dark"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- bootstrap script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>