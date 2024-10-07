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
        $artnum = $_POST["artikelnummer"];
        $naam = $_POST["Naam"];
        $genre = $_POST["Genre"];
        $prijs = $_POST["Prijs"];
        $voorraad = $_POST["voorraad"];

        echo "<p class='lead'>U hebt de volgende gegevens gewijzigd:</p>";
        
        echo "<p><strong>Naam:</strong> $naam</p>";
        echo "<p><strong>Genre:</strong> $genre</p>";
        echo "<p><strong>Prijs:</strong> $prijs</p>";
        echo "<p><strong>Voorraad:</strong> $voorraad</p>";

        $query = "UPDATE games SET Naam = '$naam', Genre = '$genre', Prijs = $prijs, Voorraad = $voorraad WHERE Artikelnr = $artnum";

        $resultaat = $dbVerbinding->query($query);

        // sluiten database
        $dbVerbinding->close();
    }
    ?>

    <a class="btn btn-primary" href="games.php">Naar Overzicht</a>
</div>

</body>
</html>

