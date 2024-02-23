<?php

    include "../../config/autoload.php";
    include "../../config/db.php";


    if (isset($_POST['id_tour_operator'])){

        $tourOperateurManager = new TouroperatorManager($db);
        $operator = new Touroperator(['id'=>$_POST['id_tour_operator']]);

        $tourOperateurManager->deleteTo($operator);

        header('Location:../list_TourOperator.php?message=L\'opérateur a été supprimé.'); 

    }else{
        header('Location:../list_TourOperator.php?message=Remplissez les champs.');

    }

?>
