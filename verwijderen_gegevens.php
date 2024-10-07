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
    <title>Formulier: verwijder artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
        .table
        {
            background-color: #ffffff;
            
        }
    </style>
</head>


<body style="background-color: #55DDE0;">
    <div class="container mt-5">
        <h1 class="display-4">Starcloud - verwijderen artikel</h1>

        <form action='verwijder.php' method='POST'>
            <table class="table table-bordered border border-info">
                <?php
                include("Connection.php");

                $artnr = $_POST['verstopt'];
                $query = "SELECT * FROM games WHERE Artikelnr = $artnr";
                $resultaat = $dbVerbinding->query($query);

                while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr><td>Artikelnummer: </td><td>$rij[Artikelnr]</td></tr>";
                    echo "<tr><td>Naam: </td><td>$rij[Naam]</td></tr>";
                    echo "<tr><td>Genre: </td><td>$rij[Genre]</td></tr>";
                    echo "<tr><td>Prijs: </td><td>$rij[Prijs]</td></tr>";
                    echo "<tr><td>Voorraad: </td><td>$rij[Voorraad]</td></tr>";
                    echo "<td><input type='hidden' name='artikelnummer' value='$rij[Artikelnr]'></td>";
                }
                ?>
            </table>

            <div class="mb-3">
                <input type='submit' class='btn btn-danger' name='Verwijder' value='Verwijder' />
                <input type='button' class='btn btn-secondary' value='Terug' onClick="window.location.href='games.php'" />
            </div>
        </form>
    </div>
</body>

</html>
