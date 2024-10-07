<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        .container {
            margin-top: 150px;
            
        }
        .table
        {
            background-color: #ffffff;
        }
    </style>
    <title>Formulier: wijzig artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="inlog.css"/>
</head>


<body style="background-color: #55DDE0;">


<?php
include("Connection.php");
$artnr = $_POST['verstopt'];

$query = "SELECT * FROM games WHERE Artikelnr = $artnr";
// Voer query uit in de database. Gebruik de verbinding zoals die in database.php staat
$resultaat = $dbVerbinding->query($query);

// De resultaten worden ingelezen
$rij = $resultaat->fetch_array(MYSQLI_ASSOC);

?>
<br>
<div class="container">
<h1 class="display-4">Starcloud - wijzigen artikel</h1>
<br>
<h3>Wijzig een artikel:</h3>

<form action="ARTIKEL_WIJZIGEN_DEF.php" method="POST">
    <table class="table table-bordered border border-info">
        <tr>
            <td>artikelnummer:</td>
            <td><input name="artikelnummer" value="<?php echo "$rij[Artikelnr]"; ?>" readonly /></td>
        </tr>

        <tr>
            <td>Naam:</td>
            <td><input name="Naam" value="<?php echo "$rij[Naam]"; ?>" /></td>
        </tr>
        <tr>
            <td>Genre:</td>
            <td><input name="Genre" value="<?php echo "$rij[Genre]"; ?>" /></td>
        </tr>
        <tr>
            <td>Prijs:</td>
            <td><input name="Prijs" value="<?php echo "$rij[Prijs]"; ?>"/></td>
        </tr>
        <tr>
            <td>Aantal in voorraad:</td>
            <td><input name="voorraad" value="<?php echo "$rij[Voorraad]"; ?>"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="btn btn-primary" name="submit"/>
                <input type="button" class="btn btn-secondary" value="Naar overzicht" onClick="window.location.href='games.php'">
            </td>
        </tr>
    </table>
</form>
</div>
</body>
</html>

<?php
// Sluiten database
$dbVerbinding->close();
?>