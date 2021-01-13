<?php
session_start();
require_once './funkcije.php';
echo pomakVremena();
if(empty($_SESSION["tip"])){
    $_SESSION["tip"]=0;
}
//include('sesija.class.php');
//include('korisnik.php');
//$korisnik=Sesija::dajKorisnika();
//$korime=$korisnik->get_kor_ime();
//echo $korime;
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if (!isset($_COOKIE["uvjeti_koristenja"])) {
    $vrijeme = time() + 60 * 60 * 24 * 2;
    setcookie("uvjeti_koristenja", 1, time() + (60 * 60 * 24 * 2), "/");
    phpAlert("Prihvatite uvjete korištenja");
}
if(isset($_POST["brisiKolac"])){
unset($_COOKIE["uvjeti_koristenja"]);
setcookie("uvjeti_koristenja",null,-1,"/");
header('Location:A_odBlokirajKorisnika.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Početna</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Početna">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="oglasi.js" type="text/javascript">
        </script>

    </head>
    <body>
        <header>
            <h1>Početna</h1>
        </header>
        <nav style="background-color: skyblue; height: 30px">
            <?php 
            if($_SESSION["tip"]==1 || $_SESSION["tip"]==0){
            echo "<a class=razmak href=index.php>Početna stranica</a>";
            echo "<a class=razmak href=Prijava.php>Prijava</a>";
            echo "<a class=razmak href=Registracija.php>Registracija</a>";
            echo "<a class=razmak href=odjava.php>Odjava</a>";
            echo "<a class=razmak href=Privatno/korisnici.php>Korisnici</a>"; 
            echo "<a class=razmak href=ustanove.php>Ustanove</a>";
            echo "<a class=razmak href=Dokumentacija.html>Dokumentacija</a>";
            echo "<a class=razmak href=o_autoru.html>O autoru</a>";}
           if($_SESSION["tip"]==1){echo "<a class=razmak href=A_odBlokirajKorisnika.php>Admin</a>";}   
           if($_SESSION["tip"]==2){
            echo "<a class=razmak href=index.php>Početna stranica</a>";
            echo "<a class=razmak href=M_kreirajVrstu.php>Kreiraj vrstu oglasa</a>";
            echo "<a class=razmak href=M_zahtjeviZaBlok.php>Zahtjevi za blokiranje</a>";
            echo "<a class=razmak href=M_zahtjeviZaOglasima.php>Zahtjevi za oglasima</a>";
            echo "<a class=razmak href=odjava.php>Odjava</a>";
            echo "<a class=razmak href=o_autoru.html>O autoru</a>";}           
            if($_SESSION["tip"]==3){
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
        
        <div style="text-align: center" id="prviOglas">
        </div>
        <div id="google_translate_element"></div>
        <p>Dobrodošli na početnu stranicu Hitne službe 112</p>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <?php 
        if($_SESSION["tip"]==1){
            echo"<form method=post action=index.php>";
            echo "<input type=submit name=brisiKolac value=\"Briši kolačić\"> </form>";}
        
        ?>
        <div style="text-align: center" id="drugiOglas">

        </div>        
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
