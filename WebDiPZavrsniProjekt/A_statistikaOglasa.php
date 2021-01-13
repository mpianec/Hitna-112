<?php
session_start();
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Statistika plaćenih oglasa</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Statistika plaćenih oglasa">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="zahtjevZaOglas.js" type="text/javascript">
        </script>

    </head>
    <body>
        <header>
            <h1>Statistika plaćenih oglasa</h1>
        </header>
        <nav style="background-color: skyblue; height: 30px">
            <a class="razmak" href="index.php">Početna stranica</a>
            <a class="razmak" href="Prijava.php">Prijava</a>
            <a class="razmak" href="Registracija.php">Registracija</a>
            <a class="razmak" href="odjava.php">Odjava</a>
            <a class="razmak" href="Privatno/korisnici.php">Korisnici</a> 
            <a class="razmak" href="ustanove.php">Ustanove</a>
            <a class="razmak" href="Dokumentacija.html">Dokumentacija</a>
            <a class="razmak" href="o_autoru.html">O autoru</a>
            <?php if($_SESSION["idKorisnik"]==1){echo "<a class=razmak href=A_odBlokirajKorisnika.php>Admin</a>";}           
            ?>            
        </nav> 
        <div id="google_translate_element"></div>

        <br><br><br>
        <?php
        $tablica = "";      
        $tablica .= "<table>";
        $tablica .= "<tr>";
        $tablica .= "<th>Naziv oglasa</th>";
        $tablica .= "<th>Cijena</th>";
        $tablica .= "<th>Vrsta oglasa</th>";
        $tablica .= "</tr>";
        
        $sql = "select Oglas.naziv,Vrsta_oglasa.naziv as naziv2,Vrsta_oglasa.cijena  from Oglas,Vrsta_oglasa where Oglas.Status='Aktivan' and Oglas.Vrsta_oglasa_idVrsta_oglasa=Vrsta_oglasa.idVrsta_oglasa order by Vrsta_oglasa.cijena desc";
        $rez = $baza->selectDB($sql);
        while ($red = $rez->fetch_assoc()) {
            $lista[] = array(
                "naziv" => $red["naziv"],
                "naziv2" => $red["naziv2"],
                "cijena" => $red["cijena"]
            );
        }
        
        for ($i = 0; $i < count($lista); $i++) {
            $tablica .= "<tr>";
            $tablica .= "<td>" . $lista[$i]["naziv"] . "</td>";
            $tablica .= "<td>" . $lista[$i]["cijena"] . "</td>";
            $tablica .= "<td>" . $lista[$i]["naziv2"] . "</td>";
            $tablica .= "</tr>";
        }
        $tablica .= "</table>";
        $tablica .= "</form>";
        echo $tablica;
        $baza->zatvoriDB();
        ?>

        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
