<?php
require_once './baza.class.php';
require_once './funkcije.php';
dohvatiVrijeme();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Pomak vremena</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Pomak vremena">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="oglasi.js" type="text/javascript">
        </script>
       
    </head>
    <body>
        <header>
            <h1>Pomak vremena</h1>
        </header>
         <nav style="background-color: skyblue; height: 30px">
            <a class="razmak" href="index.php">Početna stranica</a>
            <a class="razmak" href="Prijava.php">Prijava</a>
            <a class="razmak" href="Registracija.php">Registracija</a>
            <a class="razmak" href="odjava.php">Odjava</a>
            <a class="razmak" href="Privatno/korisnici.php">Korisnici</a> 
            <a class="razmak" href="ustanove.php">Ustanove</a>
        </nav>  
        <a class="gumbi" href="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html"><input type="submit"/></a>
         <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>