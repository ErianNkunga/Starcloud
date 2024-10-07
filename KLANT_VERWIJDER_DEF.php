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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
</head>

<body class="bg-light">

<div class="container mt-5">
    <?php
    include("Connection.php");
    $artnr = $_POST['Klantnummer'];
    $query = "DELETE FROM klanten WHERE Klantnr = $artnr";
    
    $resultaat = $dbVerbinding->query($query);
    echo "<p class='lead'>Het klant is verwijderd</p>";
    ?>
    <a class="btn btn-primary" href="klanten.php">Naar Overzicht</a>
</div>

</body>
</html>
