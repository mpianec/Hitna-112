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
            <?php
            if ($_SESSION["tip"] == 3) {
                echo "<a class=razmak href=index.php>Početna stranica</a>";
                echo "<a class=razmak href=R_DajOglas.php>Zahtjev za oglas</a>";
                echo "<a class=razmak href=R_mojiOglasi.php>Moji oglasi</a>";
                echo "<a class=razmak href=R_statistikaKlikova.php>Statistika klikova</a>";
                echo "<a class=razmak href=zaBlokiranjeOglasa.php>Zahtjev za blokiranje</a>";
                echo "<a class=razmak href=odjava.php>Odjava</a>";
                echo "<a class=razmak href=o_autoru.html>O autoru</a>";
            }
            ?>
        </nav>  
        <div id="google_translate_element"></div>

        <?php       
            $tablica = "";
            $tablica .= "<form method=post action=R_statistikaKlikova.php>";
            $tablica .= "<input type=textbox name=vrsta placeholder=\"Unesite vrstu\"><br>";
            $tablica .= "<input  type=submit name=filtVrsta value=\"Filtriraj po vrsti\"><br>";
            $tablica .= "<input type=submit name=filtDesc value=\"Sortiraj silazno\">";
            $tablica .= "<input type=submit name=filtAsc value=\"Sortiraj uzlazno\">";
            $tablica .= "<table>";
            $tablica .= "<tr>";
            $tablica .= "<th>Naziv oglasa</th>";
            $tablica .= "<th>Broj klikova</th>";
            $tablica .= "<th>Naziv vrste</th>";
            $tablica .= "</tr>";
            if (isset($_POST["filtVrsta"])) {
                $sql = "select Oglas.naziv,Oglas.broj_klikova,Vrsta_oglasa.naziv as naziv2 from Oglas,Vrsta_oglasa where Oglas.Vrsta_oglasa_idVrsta_oglasa=Vrsta_oglasa.idVrsta_oglasa and Oglas.Korisnik_korisnik_id=$_SESSION[idKorisnik] and Vrsta_oglasa.naziv='$_POST[vrsta]'";
                $rez = $baza->selectDB($sql);
                while ($red = $rez->fetch_assoc()) {
                    $lista[] = array(
                        "naziv" => $red["naziv"],
                        "broj_klikova" => $red["broj_klikova"],
                        "naziv2" => $red["naziv2"]
                    );
                }
            } elseif (isset($_POST["filtDesc"])) {
                $sql = "select Oglas.naziv,Oglas.broj_klikova,Vrsta_oglasa.naziv as naziv2 from Oglas,Vrsta_oglasa where Oglas.Vrsta_oglasa_idVrsta_oglasa=Vrsta_oglasa.idVrsta_oglasa and Oglas.Korisnik_korisnik_id=$_SESSION[idKorisnik] order by broj_klikova desc";
                $rez = $baza->selectDB($sql);
                while ($red = $rez->fetch_assoc()) {
                    $lista[] = array(
                        "naziv" => $red["naziv"],
                        "broj_klikova" => $red["broj_klikova"],
                        "naziv2" => $red["naziv2"]
                    );
                }
            } elseif (isset($_POST["filtAsc"])) {
                $sql = "select Oglas.naziv,Oglas.broj_klikova,Vrsta_oglasa.naziv as naziv2 from Oglas,Vrsta_oglasa where Oglas.Vrsta_oglasa_idVrsta_oglasa=Vrsta_oglasa.idVrsta_oglasa and Oglas.Korisnik_korisnik_id=$_SESSION[idKorisnik] order by broj_klikova asc";
                $rez = $baza->selectDB($sql);
                while ($red = $rez->fetch_assoc()) {
                    $lista[] = array(
                        "naziv" => $red["naziv"],
                        "broj_klikova" => $red["broj_klikova"],
                        "naziv2" => $red["naziv2"]
                    );
                }
            } else {
                $sql = "select Oglas.naziv,Oglas.broj_klikova,Vrsta_oglasa.naziv as naziv2 from Oglas,Vrsta_oglasa where Oglas.Vrsta_oglasa_idVrsta_oglasa=Vrsta_oglasa.idVrsta_oglasa and Oglas.Korisnik_korisnik_id=$_SESSION[idKorisnik]";
                $rez = $baza->selectDB($sql);
                while ($red = $rez->fetch_assoc()) {
                    $lista[] = array(
                        "naziv" => $red["naziv"],
                        "broj_klikova" => $red["broj_klikova"],
                        "naziv2" => $red["naziv2"]
                    );
                }
            }
            for ($i = 0; $i < count($lista); $i++) {
                $tablica .= "<tr>";
                $tablica .= "<td>" . $lista[$i]["naziv"] . "</td>";
                $tablica .= "<td>" . $lista[$i]["broj_klikova"] . "</td>";
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


