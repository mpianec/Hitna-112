<?php
include("baza.class.php");
session_start();
$baza = new Baza();
$baza->spojiDB();
if (isset($_POST['odblokni'])) {
    $sql2 = "update Korisnik set status=1 where korisnicko_ime='$_POST[blokirani]'";
    $baza->updateDB($sql2);
    $vrijeme=date('Y-m-d H:i:s');
    $sqlDnevnik="insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Blokiranje','Admin je odblokirao korisnika.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}
if (isset($_POST['blokni'])) {
    $sql4 = "update Korisnik set status=0 where korisnicko_ime='$_POST[neblokirani]'";
    $baza->updateDB($sql4);
    $vrijeme=date('Y-m-d H:i:s');
    $sqlDnevnik="insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Blokiranje','Admin je blokirao korisnika.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stranica administratora</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Stranica administratora">
        <meta name="autor" content="Matija Pianec">
        <script src="brišiCookie.js" type="text/javascript">
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
            <h1>Adminove stranice</h1>
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
        <h2>Otključavanje računa: </h2>
        <form id="odblok" method="post" name="odblok" action="A_odBlokirajKorisnika.php">
            <label class="labela" for="blokirani">Blokirani korisnici</label>
            <select class="textbox" name="blokirani">
                <option>Odaberi korisnika</option>
                <?php
                $sql = "select korisnicko_ime from Korisnik where status=0";
                $result = $baza->selectDB($sql);
                while ($red = mysqli_fetch_array($result)) {
                    echo "<option value=" . $red['korisnicko_ime'] . ">" . $red['korisnicko_ime'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input class="gumbi" type="submit" name="odblokni" value="Odblokiraj korisnika">
        </form>
        <br>
        <h2>Blokiranje računa: </h2>
        <form id="blok" method="post" name="blok" action="A_odBlokirajKorisnika.php">
            <label class="labela" for="normalni">Ne blokirani korisnici</label>
            <select class="textbox" name="neblokirani">
                <option>Odaberi korisnika</option>
                <?php
                $sql3 = "select korisnicko_ime from Korisnik where status=1";
                $result2 = $baza->selectDB($sql3);
                while ($red2 = mysqli_fetch_array($result2)) {
                    echo "<option value=" . $red2['korisnicko_ime'] . ">" . $red2['korisnicko_ime'] . "</option>";
                }
                ?> 
            </select>
            <br><br>
            <input class="gumbi" type="submit" name="blokni" value="Blokiraj korisnika">
        </form>
        <input type="button" onclick="location = 'moderatorIUstanove.php'" value="Moderatori i ustanove">
        <input type="button" onclick="location = 'stvaranjePozicije.php'" value="Pozicije">
        <input type="button" onclick="location =' A_pregledDnevnika.php'" value="Dnevnik">
        <input type="button" onclick="location='A_statistikaKlikova.php'" value="Statistika klikova">
        <input type="button" onclick="location='A_statistikaOglasa.php'" value="Statistika oglasa">
        <input type="button" onclick="location='A_topKorisnici.php'" value="Top korisnici">
        <?php $baza->zatvoriDB(); ?>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
