
<?php

require_once("../config/autoload.php");

   require_once("../config/db.php");

if (
    isset($_POST['user_name']) && !empty($_POST['user_name']) &&
    isset($_POST['password']) && !empty($_POST['password'])
) {
 
$userManager = new UserManager($db);
$userManager->addUser($_POST['user_name'], $_POST['password']);

header('Location: ../voyage.php');
exit;

} else {
    echo "Veuillez remplir tous les champs";
}
?>

    
    

