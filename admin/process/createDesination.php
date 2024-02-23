<?php
include "../../config/autoload.php";
include "../../config/db.php";
$destinationManager = new DestinationManager($db);

var_dump($destinationManager);
if (isset($_POST['location']) && isset($_POST['price'])){


    var_dump($_POST);
    $destination = new Destination([
      'location'=> $_POST['location'], 
      'price' => intval($_POST['price']), 
      'tour_operator_id'=> intval($_POST['tour_operator_id']),
    ]);

    var_dump($destination);

    $destinationManager->createDestination($destination);
  

  header('Location: ../../index.php?message=La Destination a été crée.');
}

?>