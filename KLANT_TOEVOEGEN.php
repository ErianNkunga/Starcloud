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
    <title>Formulier: invoer Klant</title>
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
        <h1 class="display-4">Starcloud - toevoegen klant</h1>
        <br>
        <h3>Voer een Klant in:</h3>

        <form action="KLANT_TOEVOEGEN.php" method="POST">
            <table class="table">
                
                <tr>
                    <td>Naam:</td>
                    <td><input class="form-control" name="naam" /></td>
                </tr>
                <tr>
                    <td>Adres:</td>
                    <td><input class="form-control" name="Adres" /></td>
                </tr>
                <tr>
                    <td>Postcode:</td>
                    <td><input class="form-control" name="postcode" /></td>
                </tr>
                <tr>
                    <td>Woonplaats:</td>
                    <td><input class="form-control" name="woonplaats" /></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input class="form-control" name="email" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" name="submit" />
                        <input type="button" class="btn btn-secondary" value="Naar overzicht"
                            onClick="window.location.href='klanten.php'">
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
   
    $naam = $_POST["naam"];
    $Adres = $_POST["Adres"];
    $postcode = $_POST["postcode"];
    $woonplaats = $_POST["woonplaats"];
    $email = $_POST["email"];

    echo "U hebt de volgende gegevens ingevoerd: <br>";
    echo "Klantnummer: $klantnum <br>";
    echo "Naam: $naam <br>";
    echo "Adres: $Adres <br>";
    echo "Postcode: $postcode <br>";
    echo "E-mail: $email";


    $query = "INSERT INTO klanten (Naam, Adres, Postcode, Woonplaats, Email)
                VALUES ('$naam', '$Adres', '$postcode', '$woonplaats', '$email')";

    $resultaat = $dbVerbinding->query($query);

    $dbVerbinding->close();
}
?>
