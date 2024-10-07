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
    <style>
        
        .container {
            margin-top: 150px;
        }
        .table
        {
            background-color: #ffffff;
        }
    </style>
    <title>Formulier: wijzig Klanten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="inlog.css"/>
</head>


<body style="background-color: #55DDE0;">


<?php
include("Connection.php");
$artnr = $_POST['verstopt'];

$query = "SELECT * FROM klanten WHERE Klantnr = $artnr";
// Voer query uit in de database. 
$resultaat = $dbVerbinding->query($query);

// De resultaten worden ingelezen
$rij = $resultaat->fetch_array(MYSQLI_ASSOC);

?>
<br>
<div class="container">
<h1 class="display-4">Starcloud - wijzigen Klanten</h1>
<br>
<h3>Wijzig klant:</h3>

<form action="KLANT_WIJZIGEN_DEF.php" method="POST">
    <table class="table table-bordered border border-info">
        <tr>
            <td>Klantnummer:</td>
            <td><input name="klantnummer" value="<?php echo "$rij[Klantnr]"; ?>" readonly /></td>
        </tr>

        <tr>
            <td>Naam:</td>
            <td><input name="Naam" value="<?php echo "$rij[Naam]"; ?>" /></td>
        </tr>
        <tr>
            <td>Adres</td>
            <td><input name="Adres" value="<?php echo "$rij[Adres]"; ?>" /></td>
        </tr>
        <tr>
            <td>Postcode:</td>
            <td><input name="Postcode" value="<?php echo "$rij[Postcode]"; ?>"/></td>
        </tr>
        <tr>
            <td>Woonplaats:</td>
            <td><input name="Woonplaats" value="<?php echo "$rij[Woonplaats]"; ?>"/></td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td><input name="Email" value="<?php echo "$rij[Email]"; ?>"/></td>
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