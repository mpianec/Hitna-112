<?php
session_start();
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();
if (isset($_POST['zahtjev'])) {
    $sql2 = "insert into Oglas (naziv,opis,slika,url,Vrsta_oglasa_idVrsta_oglasa,Pozicija_idPozicija,Korisnik_korisnik_id,Status) values ('$_POST[nazivOglasa]','$_POST[opisOglasa]','$_POST[slikaOglasa]','$_POST[urlOglasa]',$_POST[vrstaOglasa],$_POST[pozicije],$_SESSION[idKorisnik],'Neaktivan') ";
    $baza->updateDB($sql2);
    $vrijeme = date('Y-m-d H:i:s');
    $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Predan zahtjev','Korisnik je predao zahtjev za oglas.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Zahtjev za oglas</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Početna">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="zahtjevZaOglas.js" type="text/javascript">
        </script>

    </head>
    <body>
        <header>
            <h1>Zahtjev za oglas</h1>
        </header>
        <nav style="background-color: skyblue; height: 30px">
          <?php if($_SESSION["tip"]==3){
                echo "<a class=razmak href=index.php>Početna stranica</a>";
                echo "<a class=razmak href=R_DajOglas.php>Zahtjev za oglas</a>";
                echo "<a class=razmak href=R_mojiOglasi.php>Moji oglasi</a>";
                echo "<a class=razmak href=R_statistikaKlikova.php>Statistika klikova</a>";
                echo "<a class=razmak href=zaBlokiranjeOglasa.php>Zahtjev za blokiranje</a>";
                echo "<a class=razmak href=odjava.php>Odjava</a>";
                echo "<a class=razmak href=o_autoru.html>O autoru</a>"; 
            } ?>
        </nav>  
        <div id="google_translate_element"></div>

        <form method="post" name="zahtjev" id="zahtjevID" action="R_DajOglas.php">
            <label class="labela" for="nazivOglasa">Naziv: </label>
            <input class="textbox" type="textbox" id="nazivOglasa" name="nazivOglasa" placeholder="Naziv">
            <label class="labela" for="slikaOglasa">URL slike: </label>
            <input class="textbox" type="textbox" id="slikaOglasa" name="slikaOglasa" placeholder="URL slike">
            <label class="labela" for="urlOglasa">URL: </label>
            <input class="textbox" type="textbox" id="urlOglasa" name="urlOglasa" placeholder="URL">
            <label class="labela" for="opisOglasa">Opis: </label>
            <input class="textbox" type="textbox" id="opisOglasa" name="opisOglasa" placeholder="Opis oglasa">
            <?php
            echo '<label class="labela" for="stranica">Stranica: </label> ';
            echo '<select class="textbox" id="stranica" name="stranica">';
            $sql = "select idStranica,url from Stranica";
            $rezultat = $baza->selectDB($sql);
            while (list($idStranica, $url) = $rezultat->fetch_array()) {
                print"<option value=$idStranica>$url</option>";
            }
            echo '</select>';
            ?>
            <label class="labela" for="pozicije">Pozicije</label>
            <select class="textbox" id="pozicije" name="pozicije"></select>
            <label class="labela" for="vrstaOglasa">Vrsta oglasa</label>
            <select class="textbox" id="vrstaOglasa" name="vrstaOglasa"></select> <br><br><br><br><br><br><br><br><br><br><br><br>
            <input type="submit" name="zahtjev" id="zahtjev" value="Predaj zahtjev">
        </form>
<?php $baza->zatvoriDB();?>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
