<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier: invoer artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
        body {
            background-color: #55DDE0;
        }

        .container {
            margin-top: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="display-4">Starcloud - toevoegen game</h1>
        <br>
        <h3>Voer een game in:</h3>

        <form action="artikel_toevoegen.php" method="POST">
            <table class="table">
                
                <tr>
                    <td>Naam:</td>
                    <td><input class="form-control" name="artikelnaam" /></td>
                </tr>
                <tr>
                    <td>Genre:</td>
                    <td><input class="form-control" name="Genre" /></td>
                </tr>
                <tr>
                    <td>Prijs:</td>
                    <td><input class="form-control" name="prijs" /></td>
                </tr>
                <tr>
                    <td>Voorraad:</td>
                    <td><input class="form-control" name="Voorraad" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" name="submit" />
                        <input type="button" class="btn btn-secondary" value="Naar overzicht"
                            onClick="window.location.href='games.php'">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php

include("Connection.php");

if (isset($_POST["submit"])) {
    $artnum = $_POST["artikelnummer"];
    $artnaam = $_POST["artikelnaam"];
    $Genre = $_POST["Genre"];
    $prijs = $_POST["prijs"];
    $voorraad = $_POST["Voorraad"];

    echo "U hebt de volgende gegevens ingevoerd: <br>";
    
    echo "artikelnaam: $artnaam <br>";
    echo "Genre: $Genre <br>";
    echo "prijs: $prijs <br>";
    echo "de voorraad is op $voorraad gezet";

    $query = "INSERT INTO games (Naam, Prijs, Genre, Voorraad)
                VALUES ('$artnaam', '$prijs', '$Genre', '$voorraad')";

    $resultaat = $dbVerbinding->query($query);

    $dbVerbinding->close();
}
?>
