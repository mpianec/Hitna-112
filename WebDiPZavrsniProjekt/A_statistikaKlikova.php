<?php
session_start();
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Statistika klikova</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Statistika klikova">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="zahtjevZaOglas.js" type="text/javascript">
        </script>

    </head>
    <body>
        <header>
            <h1>Statistika klikova</h1>
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

        
        <?php
        $tablica = "";
        $tablica .= "<form method=post action=A_statistikaKlikova.php>";
        $tablica .= "<input type=textbox id=korisnik name=korisnik placeholder=\"Unesite korisnika\"><br>";
        $tablica .= "<input  type=submit name=filtKor value=\"Filtriraj po korisniku\"><br>";
        $tablica .= "<table>";
        $tablica .= "<tr>";
        $tablica .= "<th>Naziv oglasa</th>";
        $tablica .= "<th>Broj klikova</th>";
        $tablica .= "<th>Korisnik</th>";
        $tablica .= "</tr>";
        if (isset($_POST["filtKor"])) {
            $sql = "select Oglas.naziv,Oglas.broj_klikova,Korisnik.korisnicko_ime  from Oglas,Korisnik where Oglas.Korisnik_korisnik_id=Korisnik.korisnik_id and Korisnik.korisnicko_ime='$_POST[korisnik]'";
            $rez = $baza->selectDB($sql);
            while ($red = $rez->fetch_assoc()) {
                $lista[] = array(
                    "naziv" => $red["naziv"],
                    "broj_klikova" => $red["broj_klikova"],
                    "korisnicko_ime" => $red["korisnicko_ime"]
                );
            }
        }
        else{
        $sql = "select Oglas.naziv,Oglas.broj_klikova,Korisnik.korisnicko_ime  from Oglas,Korisnik where Oglas.Korisnik_korisnik_id=Korisnik.korisnik_id order by Oglas.broj_klikova desc";
        $rez = $baza->selectDB($sql);
        while ($red = $rez->fetch_assoc()) {
            $lista[] = array(
                "naziv" => $red["naziv"],
                "broj_klikova" => $red["broj_klikova"],
                "korisnicko_ime" => $red["korisnicko_ime"]
            );
        }}
        for ($i = 0; $i < count($lista); $i++) {
            $tablica .= "<tr>";
            $tablica .= "<td>" . $lista[$i]["naziv"] . "</td>";
            $tablica .= "<td>" . $lista[$i]["broj_klikova"] . "</td>";
            $tablica .= "<td>" . $lista[$i]["korisnicko_ime"] . "</td>";
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
