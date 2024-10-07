<!DOCTYPE html>
<?php

session_start();// sessie starten

//testen of de gemaakte nog niet bestaat

if(!isset($_SESSION['mijnid']))
{
    
    header("Location: inlog.html");
    exit;
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starcloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="inlog.css"/>
    <style>
        body   
        {
            background-color: #55DDE0;
        }

        .table
        {
            background-color: #ffffff;
        }
    </style>
</head>

<body>

<?php
// in database.php wordt de verbinding naar de database gemaakt
include("Connection.php");
?>

<br>
<h1 class="display-4"><center>Overzicht Klanten</center></h1>
<br>
<table class="table table-bordered border border-info">

    <thead>
        <tr>
            <th>Klantnummer</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Postcode</th>
            <th>Woonplaats</th>
            <th>E-mail</th>
            <th>Wijzig</th>
            <th>Verwijder</th>
            <th>Factuur</th>
        </tr>
    </thead>
    <tbody>

    <?php
    // Bepaal query
    // Selecteer de eerste 5 klanten
    $query = "SELECT * FROM klanten";

    // Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
    $resultaat = $dbVerbinding->query($query);

    // De resultaten worden ingelezen in een array
    while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC)) {
        $allerijen[] = $rij;
    }
   
    // Elke regel uit de array wordt in een tabel getoond
    foreach ($allerijen as $record) {
        echo "<tr>";
        echo "<td>{$record['Klantnr']}</td>";
        echo "<td>{$record['Naam']}</td>";
        echo "<td>{$record['Adres']}</td>";
        echo "<td>{$record['Postcode']}</td>";
        echo "<td>{$record['Woonplaats']}</td>";
        echo "<td>{$record['Email']}</td>";

        echo "<td><form action='KLANT_WIJZIGEN.php' method='post'>
            <input type='hidden' name='verstopt' value='{$record['Klantnr']}'>
            <button type='submit' class='btn btn-primary' name='wijzig'>Wijzig</button>
        </form></td>";

        echo "<td><form action='KLANT_VERWIJDER.php' method='post'>
            <input type='hidden' name='verstopt' value='{$record['Klantnr']}'>
            <button type='submit' class='btn btn-danger' name='verwijder'>Verwijder</button>
        </form></td>";
        
        echo "<td><form action='factuur.php' method='post'>
        <input type='hidden' name='verstopt' value='{$record['Klantnr']}'>
        <button type='submit' class='btn btn-secondary' name='Factuur'>Factuur</button>
    </form></td>";
        echo "</tr>";
       
    }
 
    // Reset resultaat en sluit de verbinding
    $resultaat->free_result();
    $dbVerbinding->close();
    ?>

    </tbody>
</table>
<center>
    <br>
    <a class= btn btn-light href= KLANT_TOEVOEGEN.php role= button>Toevoegen</a>
    <br>
    <br>
    <a class= btn btn-light href= Keuze.php role= button>Ga terug</a>
</center>
</body>
</html>