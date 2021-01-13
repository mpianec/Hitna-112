<?php
if (empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
    header("Location: https://barka.foi.hr/WebDiP/2017_projekti/WebDiP2017x115/Prijava.php");
    exit();}
include("baza.class.php");
//include("sesija.class.php");
//include("korisnik.php");
//if(!isset($_SESSION["korime"])&&!empty($_SESSION["korime"])){
session_start();
if(empty($_SESSION["tip"])){
    $_SESSION["tip"]=0;
}
$korImePrijava = "";
$lozinkaPrijava = "";
$glavnaZastavicaPrijava = 0;
$zastavicaPrijavljen = 0;
$zastavicaKrivaPrijava=0;


$korisimeErr = $lozinkaErr = $blokErr = "";
if (isset($_POST["submit1"])) {
    $greska = 0;
    if (empty($_POST["korime"])) {
        $korisimeErr = "Unesite korisnicko ime. <br>";
        $greska = 1;
    }
    if (empty($_POST["lozinka"])) {
        $lozinkaErr = "Unesite lozinku. <br>";
        $greska = 1;
    }
    if ($greska == 0) {
        $totalno = 1;
        $prekid = 0;
        $vrijedi_do = time() + 3600;
        $bp = new Baza();

        $sqlProvjeraKorisime = "select korisnik_id,korisnicko_ime,Kriptirana_lozinka,email,Uloga_uloga_id,status,sol from Korisnik";

        $bp->spojiDB();
        $rs = $bp->selectDB($sqlProvjeraKorisime);
        while (list($id,$korime, $kriptiranaLozinka, $email, $id_tip, $status,$sol) = $rs->fetch_array()) {
            if ($korime == $_POST["korime"] && $kriptiranaLozinka == sha1($sol."-".$_POST["lozinka"])&& $status == 1) {
                $_SESSION["korime"]=$korime;
                $_SESSION["tip"]=$id_tip;
                $_SESSION["idKorisnik"]=$id;
                setcookie("kolacic", $korime, $vrijedi_do);
                $prekid=0;
                $vrijeme=date('Y-m-d H:i:s');
                $sqlDnevnik="insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Prijava korisnika','Prijava korisnika u sustav',$_SESSION[idKorisnik])";
                $bp->updateDB($sqlDnevnik);
                if($_SESSION["tip"]==1){
                    header('Location: A_odBlokirajKorisnika.php');
                }
                else{
                header('Location: index.php');}
                
                
                
            } elseif (empty($_SESSION["korime"])){
                $korisimeErr = "Korisnicko ime i lozinka se ne podudaraju ili racun nije aktiviran preko linka. <br>";
                $prekid = 1;
              
            }
        }
        
        $bp->zatvoriDB();
        if ($prekid == 1) {      
            $_SESSION['upravoUpisani'] = $_POST["korime"];
            if (!isset($_SESSION['brojac'])) {
                $_SESSION['brojac'] = 0;
            }
            if (isset($_SESSION['zadnjikorisnik'])) {
                if ($_SESSION['zadnjikorisnik'] === $_SESSION['upravoUpisani']) {
                    $_SESSION['brojac'] ++;
                } else {
                    $_SESSION['zadnjikorisnik'] = $_SESSION['upravoUpisani'];
                    $_SESSION['brojac'] = 0;
                }
            } else {
                $_SESSION['zadnjikorisnik'] = $_SESSION['upravoUpisani'];
            }
            
            if ($_SESSION['brojac'] ===3 ) {
                unset($_SESSION['brojac']);
                $_SESSION['brojac'] = 0;
                $blokErr = "Zbog neuspješnih prijava korisnik je blokiran. <br>";
                $bp->spojiDB();

                $sqlUpdate = "UPDATE Korisnik SET status = 0 WHERE korisnicko_ime = '{$_SESSION["zadnjikorisnik"]}'";
                $bp->updateDB($sqlUpdate);
                unset($_SESSION['brojac']);
                $bp->zatvoriDB();
            }   
        }
    }
}


//$baza->zatvoriDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prijava</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Prijava">
        <meta name="autor" content="Matija Pianec">
        <script src="mpianec_js.js" type="text/javascript">
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="oglasi.js" type="text/javascript">
        </script>
    </head>
    <body>
        <header>
            <h1>Prijava</h1>
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
        <br><br>     
        <div>
            <form id="prijava" method="post" name="formaPrijave" action="Prijava.php">
                <label class="labela" for="korime">Korisničko ime: </label>
                <input class="textbox" type="text" id="korime" name="korime" size="20" maxlength="20" placeholder="korisničko ime" autofocus="autofocus" required="required"><br><br>
                <label class="labela" for="lozinka">Lozinka: </label>
                <input class="textbox" type="password" id="lozinka" name="lozinka" size="15" maxlength="15" placeholder="lozinka" required="required"><br><br>
                <input class="gumbi" type="submit" name="submit1" value=" Prijavi se ">
                <input class="gumbi" type="button" name="zaborav" onclick="location='zaboravljenaLozinka.php'" value="Zaboravljena lozinka">
            </form>
            <?php
            echo $korisimeErr;
            echo $lozinkaErr;
            echo $blokErr;
            ?>
        </div>
        <div style="text-align: center" id="sestiOglas">

        </div> 
        <br>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>

