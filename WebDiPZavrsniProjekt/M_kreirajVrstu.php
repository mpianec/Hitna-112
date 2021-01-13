<?php
session_start();
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();
$nesto = "";
if (isset($_POST["dajVrstu"])) {
    $sqlKreiraj = "insert into Vrsta_oglasa (trajanje_prikaza,brzina_izmjene,cijena,naziv,Pozicija_idPozicija) values ($_POST[trajanje],$_POST[brzina],$_POST[cijena],'$_POST[naziv]',$_POST[stranica])";
    $baza->updateDB($sqlKreiraj);   
    $vrijeme=date('Y-m-d H:i:s');
    $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Kreiranje','Moderator je kreirao vrstu oglasa.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kreiranja vrste oglasa</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Kreiraj vrstu">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


    </head>
    <body>
        <header>
            <h1>Kreiranje vrste oglasa</h1>
        </header>
        <nav style="background-color: skyblue; height: 30px">
           <?php
            if($_SESSION["tip"]==2){
            echo "<a class=razmak href=index.php>Početna stranica</a>";
            echo "<a class=razmak href=M_kreirajVrstu.php>Kreiraj vrstu oglasa</a>";
            echo "<a class=razmak href=M_zahtjeviZaBlok.php>Zahtjevi za blokiranje</a>";
            echo "<a class=razmak href=M_zahtjeviZaOglasima.php>Zahtjevi za oglasima</a>";
            echo "<a class=razmak href=odjava.php>Odjava</a>";
            echo "<a class=razmak href=o_autoru.html>O autoru</a>";}           
            ?>  
        </nav>  
        <div id="google_translate_element"></div>


        <?php
        $nesto .= "<form method=post id=vrsta name=vrsta action=M_kreirajVrstu.php>";
        $nesto .= "<label class=labela for=trajanje>Trajanje[h]: </label>";
        $nesto .= "<input class=textbox type=number id=trajanje name=trajanje min=0>";
        $nesto .= "<label class=labela for=brzina>Brzina[sec]: </label>";
        $nesto .= "<input class=textbox type=number id=brzina name=brzina min=0>";
        $nesto .= "<label class=labela for=cijena>Cijena: </label>";
        $nesto .= "<input class=textbox type=number id=cijena name=cijena min=0>";
        $nesto .= "<label class=labela for=naziv>Naziv: </label>";
        $nesto .= "<input class=textbox type=textbox id=naziv name=naziv min=0>";
        $nesto .= '<label class="labela" for="stranica">Pozicija: </label> ';
        $nesto .= '<select class="textbox" id="stranica" name="stranica">';
        $sql = "select idPozicija,naziv from Pozicija where Korisnik_korisnik_id=$_SESSION[idKorisnik]";
        $rezultat = $baza->selectDB($sql);
        while (list($idPozicija, $naziv) = $rezultat->fetch_array()) {
            $nesto .= "<option value=$idPozicija>$naziv</option>";
        }
        $nesto .= '</select><br><br><br><br><br><br><br><br><br>';
        $nesto .= "<input class=gumbi type=submit name=dajVrstu id=dajVrstu value=\"Kreiraj vrstu\">";
        $nesto .= "</form>";
        echo $nesto;
        $baza->zatvoriDB();
        ?>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
