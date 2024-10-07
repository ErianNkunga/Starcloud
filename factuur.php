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
    <title>Starcloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="inlog.css"/>
    <style>
        body {
            background-color: #55DDE0;
        }
        
        .table  {
            background-color: #ffffff;
        }

    </style>        
</head>
<body>
<div class="container">
<?php

include("Connection.php");
$klantnr = $_POST['verstopt'];

$query = "SELECT * FROM klanten WHERE klantnr = $klantnr";

$resultaat = $dbVerbinding->query($query);

// De resultaten worden ingelezen
$rij = $resultaat->fetch_array(MYSQLI_ASSOC);

echo "
    <div class='container mt-5'>
        <h1 class='display-4'>Starcloud - factuur klant</h1>
        <br>
        <table class='table table-bordered border border-info'>
            <tr><td>Klantnummer:</td><td>$rij[Klantnr]</td></tr>
            <tr><td>Klantnaam:</td><td>$rij[Naam]</td></tr>
            <tr><td>Adres:</td><td>$rij[Adres]</td></tr>
            <tr><td>Postcode:</td><td>$rij[Postcode]</td></tr>
            <tr><td>Woonplaats:</td><td>$rij[Woonplaats]</td></tr>
            <tr><td>E-mail:</td><td>$rij[Email]</td></tr>
        </table>
    </div>
";

echo "<div class='container mt-3'><h2>Details bestelling</h2>";

$query = "SELECT * FROM orderregel
    INNER JOIN `order` ON `order`.ordernummer = orderregel.ordernummer
    INNER JOIN games ON orderregel.Artikelnr = games.Artikelnr
    WHERE `order`.Klantnr = $klantnr";

// Voer query uit in de database. 
$resultaat = $dbVerbinding->query($query);

// De resultaten worden ingelezen in een array
while ($rij = $resultaat->fetch_array(MYSQLI_ASSOC))
{
    $allerijen[] = $rij;
}

echo "<table class='table table-bordered border border-info'>
        <tr><th>Ordernummer</th>
        <th>Artikelnr</th>
        <th>Omschrijving</th>
        <th>Aantal</th>
        <th>Prijs</th>
        <th>Bedrag</th></tr>";

if (isset($allerijen))
{
    // Elke regel uit de array wordt in een tabel getoond
    foreach ($allerijen as $record)
    {
        echo "<tr><td>$record[ordernummer]</td>";
        echo "<td>$record[Artikelnr]</td>";
        echo "<td>$record[Naam]</td>";
        echo "<td>$record[aantal]</td>";
        echo "<td>$record[Prijs]</td>";
        $bedrag = $record['aantal'] * $record['Prijs'];
        echo "<td>$bedrag</td>";
        echo "</tr>";
    }
    echo "</table>";
} else
{
    echo "Deze klant heeft niks gekocht.";
}

// Reset resultaat en sluit de verbinding
$resultaat->free_result();
$dbVerbinding->close();

echo "</div>";

?>
</div>
 <div class="mb-3">
    <center>
                
                <br>
                <input type='button' class='btn btn-secondary' value='Terug' onClick="window.location.href='klanten.php'" />
    </center>
            </div>
        </form>
    </div>
</body>

</html>