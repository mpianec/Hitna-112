<?php
session_start();
if(empty($_SESSION["tip"])){
    $_SESSION["tip"]=0;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ustanove</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Ustanove">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="ustanove_js.js" type="text/javascript">
        </script>
        <script src="oglasi.js" type="text/javascript">
        </script>
    </head>
    <body>
        <header>
            <h1>Ustanove</h1>
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
        <div id="google_translate_element"></div>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <div id="treciOglas" style="text-align: center">

        </div>
        <div id="listaUstanova">

        </div>
        <div style="text-align: center">
        <input type="button" id="prvaStranica" value="Prva stranica">
        <input type="button" id="prethodnaStranica" value="Prethodna stranica">
        <input type="button" id="sljedecaStranica" value="Sljedeća stranica">
        <input type="button" id="zadnjaStranica" value="Zadnja stranica">
        </div>
        <section>
            <?php
            //echo $ispis;
            ?>
        </section>
        <div id="cetvrtiOglas" style="text-align: center">

        </div>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
