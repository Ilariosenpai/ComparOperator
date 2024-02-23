<?php

require_once("config/autoload.php");
require_once("config/db.php");

if(isset($_POST['destination_name'])) {
    $destination_name = $_POST['destination_name'];
    
    $desti = new DestinationManager($db);
    $d = $desti->getDestinationByName($destination_name);
    // var_dump($d);
    
    
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/destination.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

    <header id="header">
    <div class="d-flex flex-column">

      <div class="profile"> 

        <h1 class="text-light "><a href="index.php">Comparator.</a></h1>
        <div class="social-links  text-center">

      <nav id="navbar" class="nav-menu navbar">
        <ul>
        <li><a href="index.php" class="nav-link scrollto active"><span>Home</span></a></li>
        <li><a href="voyage.php" class="nav-link scrollto active"><span>Voyage</span></a></li>
          

          
        </div>
    </div>

    <div class="d-flex justify-content-center" >
    <form action="deconnexion.php" method="post">
    <a class="nav-link active text-white d-flex align-items-center " href= "index.php" aria-current="page" >
      <i class="fa-solid fa-arrow-right-from-bracket  ">
      <p class="d-flex">Log Out</p></i>
      </form>
      </a>
  </div> 
</header>





<section class="cards">

<div class="card">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="./img/portugal.webp" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <?php foreach ($d as $to){ ?>
        <h1 class="card-title"><?= $to->getLocation() ?></h1>
        <h2 class="card-text"><?= $to->getPrice()?></h2>
        <h3 class="card-text"><?= $to->getIdTourOperator()?></h3>
       
        
        <?php } ?>



      </div>
    </div>
  </div>
</div>

    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>