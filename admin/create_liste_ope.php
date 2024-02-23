<?php 
include '../Headeur/headeurAdmin.php';
include '../config/db.php';
include '../config/autoload.php';

$toManager = new TouroperatorManager($db);
$allTO = $toManager->getAllOperator();
 ?>


<div class="createDestination">
    <div class="CreateDest">
        <h2>créer une Destination</h2>

        <form action="process/createDesination.php" method="POST">
            <label>Ajout Destination</label><br>
            <input type="text" name="location" placeholder="Destination"><br>
            <label>PRIX</label><br>
            <input type="text" name="price" placeholder="prix"><br>
           <select name="tour_operator_id">
            <?php foreach ($allTO as $TO) { ?>
                <option value="<?=$TO->getId()?>"><?=$TO->getName()?></option>
            <?php } ?>
           </select>
         
            <button type="submit">Ajout</button>
        </form>
    </div>
</div>