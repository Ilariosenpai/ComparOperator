<?php

session_start();

require_once './config/db.php';
require_once './config/autoload.php';


$destinationManager = new DestinationManager($db);
$destinations = $destinationManager->getAllDestination();




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/be3545526a.js" crossorigin="anonymous"></script>
  <link href="css/voyage.css" rel="stylesheet">
</head>

<body>

<header id="header">
    <div class="d-flex flex-column">

      <div class="profile"> 

        <h1 class="text-light "><a href="index.php">Comparator.</a></h1>
        <div class="social-links  text-center">

        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php" class="nav-link scrollto active"><span>Home</span></a></li>
          <li><a href="voyage.php" class="nav-link scrollto active"><span>Voyages</span></a></li>
          

          
        </div>
    </div>
    <?php

  if (isset($_SESSION['user_name'])) {
    echo '<div style="color: white;">Bienvenue, ' . htmlspecialchars($_SESSION['user_name']) . '!!</div>';
  
  ?>
    
  <form action="deconnexion.php" method="post">
    <a href="deconnexion.php" class="d-flex justify-content-center nav-link active text-white d-flex align-items-center" aria-current="page">
      <i class="fa-solid fa-arrow-right-from-bracket">
        <p class="d-flex">Log Out</p>
      </i>
    </a>
  </form>
    

  </div></form>
    
  <?php ;
} else{

?>






  <div id="myModal" class="modal">
    <div class="modal-content" width="auto">
      <span id="closeModalBtn" class="close">&times;</span>
      <p class="d-flex justify-content-center">Connexion :</p>

      <form action="process/traitementform.php" class="d-flex flex-column align-items-center" method="post">

        <label for="name">Pseudo:</label>
        <input type="text" id="name_connexion" name="user_name" class="pseudo" />
        <br>

        <label for="password" class="">Password :</label>
        <input type="password" id="number_connexion" name="password" class="pseudo" />
        <br>

        <button type="submit" name="submit" class="w-100 text-align">Connexion</button>

      </form>

    </div>
  </div>


  <div id="myModal2" class="modal">
              <div class="modal-content bg-danger">
                <span id="closeModalBtn2" class="close">&times;</span>
                <p>Inscription :</p>

                <form action="/process/traitementform.php" class="d-flex flex-column justify-content-center align-items-center">

                  <label for="name" class="">Pseudo :</label>
                  <input type="text" id="name" name="user_name" class="pseudo " />
                  <br>

                  <label for="password" class="">Password :</label>
                  <input type="password" id="number" name="password" class="pseudo" />
                  <br>


                  <button type="inscription" name="inscription" class="w-100 ">Inscription</button>
                </form>

              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end align-items-end ">
        <a class="nav-link active text-white d-flex align-items-center pe-4" aria-current="page" href="#" id="openModalBtn">
         
          <p>Connexion</p>
        </a>

        <a class="nav-link active text-white d-flex align-items-center" aria-current="page" href="#" id="openModalBtn2">
          
          
        </a>
        </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header ">
        <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Comparator Opérator </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">

      </div>
    </div>

    </ul>
    </nav>
    </div>
          <?php

}

?>
       
  </header>




  <div id="myModal" class="modal">
    <div class="modal-content" width="auto">
      <span id="closeModalBtn" class="close">&times;</span>
      <p class="d-flex justify-content-center">Connexion :</p>
      
      <form action="form.php" class="d-flex flex-column align-items-center">
        
        <label for="name">Pseudo:</label>
        <input type="text" id="name_connexion" name="user_name" class="pseudo" />
        <br>
        
        <label for="password" class="">Password :</label>
        <input type="password" id="number_connexion" name="password" class="pseudo" />
        <br>
        
        <button type="submit" name="submit" class="w-100 text-align">Connexion</button>
        
      </form>
      
    </div>
  </div>
  
  
  <div id="myModal2" class="modal">
    <div class="modal-content bg-danger">
      <span id="closeModalBtn2" class="close">&times;</span>
      <p>Inscription :</p>
      
      <form action="form.php" class="d-flex flex-column justify-content-center align-items-center">
        
        <label for="name" class="">Pseudo :</label>
        <input type="text" id="name" name="user_name" class="pseudo " />
        <br>
        
        <label for="password" class="">Password :</label>
        <input type="password" id="number" name="password" class="pseudo" />
        <br>
        
        
        <button type="inscription" name="inscription" class="w-100 ">Inscription</button>
      </form>
      
    </div>
  </div>
</div>






<section id="blur"></section>


<div class="d-flex justify-content-center align-items-center cards-list">
  <?php foreach ($destinations as $destination) { ?>
    <div class="card">
          <img src="./img/maroc.jpg" alt="Destination 1">
          <div class="card-content d-flex text-center flex-column">

            <h3><?php echo $destination->getLocation() ?></h3>
            <p> <?php echo $destination->getPrice() . 'euros' ?> </p>


<form action="destination.php" method="post">
            <input type="hidden" name="destination_name" value="<?php echo $destination->getLocation() ?>">
            <button type="submit" class="btn">En savoir +</button>
            </form>
          </div>
        </div>
<?php } ?>










  <script src="js/voyage.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>