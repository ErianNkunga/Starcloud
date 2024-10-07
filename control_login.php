<?php

session_start();// sessie starten

//testen of de gemaakte nog niet bestaat

if(!isset($_SESSION['mijnid']))
{
    $_SESSION['mijnid'] = uniqid();// uniek id genereren
    
}





// info word uit gehaald
$user = $_POST['Username'];
$wachtwoord = $_POST['wachtwoord'];



if ($wachtwoord == "admin" && $user == "admin")
{
    
    header("Location: Keuze.php");
    exit;
}
// gaat naar deze fout pagina als de wachtwoord of email niet goed is
else 
{
    session_destroy();
    header("Location: inlog2.html");
    exit;
}





?>


