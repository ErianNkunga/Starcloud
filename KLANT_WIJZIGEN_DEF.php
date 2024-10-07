<?php

session_start();// sessie starten

//testen of de gemaakte nog niet bestaat

if(!isset($_SESSION['mijnid']))
{
    
    header("Location: inlog.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starcloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
</head>
<body class="bg-light">

<div class="container mt-5">
    <?php
    include("Connection.php");

    if(isset($_POST["submit"])) {
        $klantnum = $_POST["klantnummer"];
        $naam = $_POST["Naam"];
        $Adres = $_POST["Adres"];
        $postcode = $_POST["Postcode"];
        $Woonplaats = $_POST["Woonplaats"];
        $email = $_POST["Email"];

        echo "<p class='lead'>U hebt de volgende gegevens gewijzigd:</p>";
        
        echo "<p><strong>Naam:</strong> $naam</p>";
        echo "<p><strong>Adres:</strong> $Adres</p>";
        echo "<p><strong>Postcode:</strong> $postcode</p>";
        echo "<p><strong>Woonplaats:</strong> $Woonplaats</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        $query = "UPDATE klanten SET Naam = '$naam', Adres = '$Adres', Postcode = '$postcode', Woonplaats = '$Woonplaats', Email = '$email' WHERE Klantnr = '$klantnum'";

        $resultaat = $dbVerbinding->query($query);

        // sluiten database
        $dbVerbinding->close();
    }
    ?>

    <a class="btn btn-primary" href="klanten.php">Naar Overzicht</a>
</div>

</body>
</html>

