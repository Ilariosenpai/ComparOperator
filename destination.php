<?php

require_once("config/autoload.php");
require_once("config/db.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if(isset($_GET['destination_id'])) {
    $destinationId = $_GET['destination_id'];

    echo "<h1>" . $destination['name'] . "</h1>";
    echo "<p>" . $destination['description'] . "</p>";
    echo "<p>" . $destination['location'] . "</p>";
}
?>





</body>
</html>