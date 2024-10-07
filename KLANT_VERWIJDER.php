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
        <br>
        <h1 class="display-4">Starcloud - verwijderen klant</h1>
        <br>
        <form action='KLANT_VERWIJDER_DEF.php' method='POST'>
            <table class="table table-bordered border border-info">
                <?php
                include("Connection.php");

                $artnr = $_POST['verstopt'];
                $query = "SELECT * FROM klanten WHERE Klantnr = $artnr";
                $resultaat = $dbVerbinding->query($query);

                while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr><td>Klantnummer: </td><td>$rij[Klantnr]</td></tr>";
                    echo "<tr><td>Naam: </td><td>$rij[Naam]</td></tr>";
                    echo "<tr><td>Adres: </td><td>$rij[Adres]</td></tr>";
                    echo "<tr><td>Postcode: </td><td>$rij[Postcode]</td></tr>";
                    echo "<tr><td>Woonplaats: </td><td>$rij[Woonplaats]</td></tr>";
                    echo "<tr><td>E-mail: </td><td>$rij[Email]</td></tr>";
                    echo "<td><input type='hidden' name='Klantnummer' value='$rij[Klantnr]'></td>";
                }
                ?>
            </table>

            <div class="mb-3">
                <input type='submit' class='btn btn-danger' name='Verwijder' value='Verwijder' />
                <input type='button' class='btn btn-secondary' value='Terug' onClick="window.location.href='klanten.php'" />
            </div>
        </form>
    </div>
</body>

</html>
