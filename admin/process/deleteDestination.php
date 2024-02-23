<?php
include "./config/autoload.php";
include "./config/db.php";
$destinationManager = new DestinationManager($db);


if (isset($_POST['location']) && isset($_POST['price'])){
    
    $destination = new Destination(['location'=> $_POST['location'] , 'price' => intval($_POST['price']) , 'id_tour_operator'=> intval($_POST['id_tour_operator']),'image'=> $_POST['image']]);
    $destinationManager->deleteDestination($destination);  

  header('Location: ./index.php?message=La Destination a été crée.');
}

?>