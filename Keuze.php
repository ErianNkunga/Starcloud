<?php

session_start();// sessie starten

//testen of de gemaakte nog niet bestaat

if(!isset($_SESSION['mijnid']))
{
    
    header("Location: inlog.html");
    exit;
}

// Logout 
if (isset($_POST['logout'])) {
    
    session_destroy();
    
    
    header("Location: inlog.html");
    exit;
}
?>
<html>
    <head>        
        <meta charset="UTF-8">
                <title>Starcloud</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
                <link rel="stylesheet" type="text/css" href="inlog.css"/>
                <style>
                a.btn 
            {
                background-color: #ffffff;
                color: #000000;
                
                
            }
                    .container
                    {
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        
                    }
        
                    
                </style>
            </head>
            <body style="background-color:#55DDE0">
        
            <div class = "title">
                <p style="font-size: 60px">Starcloud</p>
            </div>
            <div class="container">      
           
            <a class="btn btn-light" href="games.php" role="button">Games</a>
            

             <br>
             <a class="btn btn-light" href="klanten.php" role="button">Klanten</a>
             <br>
             <form method="post" action="">
                <button class="btn btn-light" type="submit" name="logout">Log uit</button>
            </form>
        
            </div>    
            </body>
</html>



