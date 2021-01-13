<?php
session_start();
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Top korisnici</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Top korisnici">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="zahtjevZaOglas.js" type="text/javascript">
        </script>

    </head>
    <body>
        <header>
            <h1>Top korisnici</h1>
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
            <?php if ($_SESSION["idKorisnik"] == 1) {
                echo "<a class=razmak href=A_odBlokirajKorisnika.php>Admin</a>";
            }
            ?>            
        </nav> 

        <div id="google_translate_element"></div>


        <?php
        $tablica = "";
        $tablica .= "<form method=post action=A_topKorisnici.php>";
        $tablica .= "<input type=number id=broj name=broj \"><br>";
        $tablica .= "<input  type=submit name=brojGumb value=\"Broj korisnika\"><br>";

        if (isset($_POST["brojGumb"])) {
            $sql = "SELECT Korisnik.korisnicko_ime, SUM( Vrsta_oglasa.cijena ) AS  'Ukupno plaćeno', Oglas.Vrsta_oglasa_idVrsta_oglasa
FROM Korisnik, Vrsta_oglasa, Oglas
WHERE Vrsta_oglasa.idVrsta_oglasa = Oglas.Vrsta_oglasa_idVrsta_oglasa
AND Korisnik.korisnik_id = Oglas.Korisnik_korisnik_id
GROUP BY Korisnik.korisnicko_ime
ORDER BY SUM( Vrsta_oglasa.cijena )  DESC";
            $rez = $baza->selectDB($sql);
            while ($red = $rez->fetch_assoc()) {
                $lista[] = array(
                    "korisnicko_ime" => $red["korisnicko_ime"],
                    "Ukupno plaćeno" => $red["Ukupno plaćeno"],
                );
            }
            if($_POST["broj"]>count($lista)){
                $tablica.="Nema toliko korisnika";
            }else{
            $tablica .= "<table>";
            $tablica .= "<tr>";
            $tablica .= "<th>Korisnik</th>";
            $tablica .= "<th>Ukupna cijena</th>";
            $tablica .= "</tr>";


            for ($i = 0; $i < $_POST["broj"]; $i++) {
                $tablica .= "<tr>";
                $tablica .= "<td>" . $lista[$i]["korisnicko_ime"] . "</td>";
                $tablica .= "<td>" . $lista[$i]["Ukupno plaćeno"] . "</td>";
                $tablica .= "</tr>";
            }
            $tablica .= "</table>";
        }
        $tablica .= "</form>";}
        echo $tablica;
        ?>
<?php $baza->zatvoriDB(); ?>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>


