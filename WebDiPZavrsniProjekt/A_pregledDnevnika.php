<?php
include("baza.class.php");
session_start();
$baza = new Baza();
$baza->spojiDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pregled dnevnika</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Pregled dnevnika">
        <meta name="autor" content="Matija Pianec">
        <script src="brišiCookie.js" type="text/javascript">
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
            <h1>Pregled dnevnika</h1>
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


        <h2>Dnevnik rada: </h2>
        <?php
        $tablica = "";
        $tablica .= "<form method=post action=A_pregledDnevnika.php>";
        $tablica .= "<input type=textbox name=kor placeholder=\"Unesite korisnika\"><br>";
        $tablica .= "<input  type=date name=datum placeholder=\"Unesite datum\"><br>";
        $tablica .= "<input  type=textbox name=aktivnost placeholder=\"Unesite aktivnost\"><br>";
        $tablica .= "<input  type=submit name=filtKor value=\"Filtriraj korisnika\"><br>";
        $tablica .= "<input  type=submit name=filtDat value=\"Filtriraj datum\"><br>";
        $tablica .= "<input type=submit name=filtAkt value=\"Filtriraj aktivnost\"><br>";
        $tablica .= "<table>";
        $tablica .= "<tr>";
        $tablica .= "<th>Tip loga</th>";
        $tablica .= "<th>Vrijeme pristupa</th>";
        $tablica .= "<th>Korisnik</th>";
        $tablica .= "</tr>";

        if (isset($_POST["filtKor"])) {
            $sql = "select dnevnikRada.tip_loga,dnevnikRada.vrijeme_pristupa,Korisnik.korisnicko_ime from dnevnikRada,Korisnik where dnevnikRada.Korisnik_korisnik_id=Korisnik.korisnik_id and Korisnik.korisnicko_ime like '%" . $_POST["kor"] . "%' order by vrijeme_pristupa asc";
            $rez = $baza->selectDB($sql);
            $lista = array();
            while ($red = $rez->fetch_assoc()) {
                $lista[] = array(
                    "tip_loga" => $red["tip_loga"],
                    "vrijeme_pristupa" => $red["vrijeme_pristupa"],
                    "korisnicko_ime" => $red["korisnicko_ime"]
                );
            }
        } elseif (isset($_POST["filtAkt"])) {
            $sql = "select dnevnikRada.tip_loga,dnevnikRada.vrijeme_pristupa,Korisnik.korisnicko_ime from dnevnikRada,Korisnik where dnevnikRada.Korisnik_korisnik_id=Korisnik.korisnik_id and dnevnikRada.tip_loga like '%" . $_POST["aktivnost"] . "%' order by vrijeme_pristupa asc";
            $rez = $baza->selectDB($sql);
            $lista = array();
            while ($red = $rez->fetch_assoc()) {
                $lista[] = array(
                    "tip_loga" => $red["tip_loga"],
                    "vrijeme_pristupa" => $red["vrijeme_pristupa"],
                    "korisnicko_ime" => $red["korisnicko_ime"]
                );
            }
        } elseif (isset($_POST["filtDat"])) {
            $sql = "select dnevnikRada.tip_loga,dnevnikRada.vrijeme_pristupa,Korisnik.korisnicko_ime from dnevnikRada,Korisnik where dnevnikRada.Korisnik_korisnik_id=Korisnik.korisnik_id and dnevnikRada.vrijeme_pristupa like '%" . $_POST["datum"] . "%' order by vrijeme_pristupa asc";
            $rez = $baza->selectDB($sql);
            $lista = array();
            while ($red = $rez->fetch_assoc()) {
                $lista[] = array(
                    "tip_loga" => $red["tip_loga"],
                    "vrijeme_pristupa" => $red["vrijeme_pristupa"],
                    "korisnicko_ime" => $red["korisnicko_ime"]
                );
            }
        } else {
            $sql = "select dnevnikRada.tip_loga,dnevnikRada.vrijeme_pristupa,Korisnik.korisnicko_ime from dnevnikRada,Korisnik where dnevnikRada.Korisnik_korisnik_id=Korisnik.korisnik_id order by vrijeme_pristupa asc";
            $rez = $baza->selectDB($sql);
            $lista = array();
            while ($red = $rez->fetch_assoc()) {
                $lista[] = array(
                    "tip_loga" => $red["tip_loga"],
                    "vrijeme_pristupa" => $red["vrijeme_pristupa"],
                    "korisnicko_ime" => $red["korisnicko_ime"]
                );
            }
        }
        for ($i = 0; $i < count($lista); $i++) {
            $tablica .= "<tr>";
            $tablica .= "<td>" . $lista[$i]["tip_loga"] . "</td>";
            $tablica .= "<td>" . $lista[$i]["vrijeme_pristupa"] . "</td>";
            $tablica .= "<td>" . $lista[$i]["korisnicko_ime"] . "</td>";
            $tablica .= "</tr>";
        }
        $tablica .= "</table>";
        $tablica .= "</form>";
        echo $tablica;
        ?>
        <?php $baza->zatvoriDB(); ?>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>



