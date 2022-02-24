<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exo complet lecture SQL.</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
 <?php
    require 'Connect.php';
    require 'Config.php';

    $myConnexion = Connect::dbConnect();

 try {
     $stmt = $myConnexion->prepare("SELECT * FROM clients");
     $state = $stmt->execute();

     echo "<div>";
     echo "<span>". "Clients"."</span>";
     if ($state) {
         foreach ($stmt->fetchAll() as $client) {
             echo "<p>".$client['lastName']." ".$client['firstName']."</p>";
         }
     }
     echo "</div>";

     $stmt = $myConnexion->prepare("SELECT * FROM showtypes");
     $state = $stmt->execute();
     echo "<div>";
     echo "<span>". "Types de spectacles"."</span>";
     if ($state) {
         foreach ($stmt->fetchAll() as $showtype) {
             echo "<p>".$showtype['type']."</p>";
         }
     }
     echo "</div>";

     $stmt = $myConnexion->prepare("SELECT * FROM clients LIMIT 20");
     $state = $stmt->execute();
     echo "<div>";
     echo "<span>". "Les 20 premiers clients"."</span>";
     if ($state) {
         foreach ($stmt->fetchAll() as $client) {
             echo "<p>".$client['lastName']." ".$client['firstName']."</p>";
         }
     }
     echo "</div>";

     $stmt = $myConnexion->prepare("SELECT * FROM clients WHERE card = 1");
     $state = $stmt->execute();
     echo "<div>";
     echo "<span>". "Clients ayant une carte de fidélité"."</span>";
     if ($state) {
         foreach ($stmt->fetchAll() as $client) {
             echo "<p>".$client['lastName']." ".$client['firstName']."</p>";
         }
     }
     echo "</div>";


 }
 catch (PDOException $exception) {
     echo $exception->getMessage();
 }



?></body>
</html>
