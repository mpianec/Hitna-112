<?php
if (empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
    header("Location: https://barka.foi.hr/WebDiP/2017_projekti/WebDiP2017x115/Registracija.php");
    exit();
}
include("baza.class.php");
session_start();
if (empty($_SESSION["tip"])) {
    $_SESSION["tip"] = 0;
}
$greska = 0;
$aktivacijskiKljuc = "";
$imeErr = $prezimeErr = $korisimeErr = $lozinkaErr = $potlozinkaErr = $danErr = $gradErr = $emailErr = "";

$a = md5(time() * microtime());
$captcha = substr($a, 0, 5);
$captchaErr = "";


if (isset($_POST["submit2"])) {
    if ($_POST["odgovor"] != $_POST["rešenje"]) {
        $captchaErr = "Krivo unesena captcha!";
        $greska = 1;
    }
    if (empty($_POST["ime"])) {
        $imeErr = "Ime je obavezno polje. <br>";
        $greska = 1;
    }
    if (empty($_POST["prezime"])) {
        $prezimeErr = "Prezime je obavezno polje. <br>";
        $greska = 1;
    }
    if (empty($_POST["korime2"])) {
        $korisimeErr = "Korisnicko ime je obavezno polje. <br>";
        $greska = 1;
    }
    if (empty($_POST["lozinka1"])) {
        $lozinkaErr = "Lozinka je obavezno polje. <br>";
        $greska = 1;
    } elseif (preg_match("/^[A-Za-z0-9$!?#]{8,}$/", $_POST["lozinka1"]) == 0) {
        $lozinkaErr = "Lozinka mora imat barem 8 znakova. <br>";
        $greska = 1;
    }
    if (empty($_POST["lozinka2"])) {
        $potlozinkaErr = "Potvrda je obavezno polje. <br>";
        $greska = 1;
    }
    if ($_POST["lozinka2"] !== $_POST["lozinka1"]) {
        $potlozinkaErr = "Potvrda lozinke je neispravna. <br>";
        $greska = 1;
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email je obavezno polje. <br>";
        $greska = 1;
    }
    if ($greska == 0) {

        $prekid = 0;
        $bp = new Baza();

        $sqlProvjeraKorisime = "select korisnicko_ime,email from Korisnik";

        $bp->spojiDB();
        $rs = $bp->selectDB($sqlProvjeraKorisime);
        
        if ($prekid == 0) {
            $aktivacijskiKljuc = sha1(date("dmY") . time() . $_POST["korime2"]);
            $sol = sha1(time());
            $kriptiranaLozinka = sha1($sol . "-" . $_POST["lozinka1"]);
            $sqlNoviUnos = "insert into `Korisnik` " .
                    "(korisnicko_ime, Lozinka, email, ime, prezime, Uloga_uloga_id, status,aktivacijski_kod,Kriptirana_lozinka,sol,ponovljena_lozinka) " .
                    "values ('$_POST[korime2]', '$_POST[lozinka1]', '$_POST[email]', '$_POST[ime]', '$_POST[prezime]', 3, 0,'$aktivacijskiKljuc','$kriptiranaLozinka','$sol','$_POST[lozinka2]')";
           

            $bp->updateDB($sqlNoviUnos);
           

            $mail_to = $_POST["email"];
            $mail_from = "FROM: mpianec";
            $mail_subject = "Link za aktivaciju racuna.";
            $time = time();
            $mail_body = "$_POST[korime2] molimo Vas da kliknete na sljedeci link kako bi aktivirali svoj racun: https://barka.foi.hr/WebDiP/2017_projekti/WebDiP2017x115/aktivacija.php?kljuc=$aktivacijskiKljuc&time=$time";
            mail($mail_to, $mail_subject, $mail_body, $mail_from);
            header('Location: Prijava.php');
        }

        $rs->close();
        $bp->zatvoriDB();
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Registracija</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <script src="mpianec_js.js" type="text/javascript">
        </script>
        <meta name="naslov" content="Registracija">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="oglasi.js" type="text/javascript">
        </script>

    </head>
    <body>
        <header>
            <h1>Registracija</h1>
        </header>
        <nav style="background-color: skyblue; height: 30px">
            <?php
            if ($_SESSION["tip"] == 1 || $_SESSION["tip"] == 0) {
                echo "<a class=razmak href=index.php>Početna stranica</a>";
                echo "<a class=razmak href=Prijava.php>Prijava</a>";
                echo "<a class=razmak href=Registracija.php>Registracija</a>";
                echo "<a class=razmak href=odjava.php>Odjava</a>";
                echo "<a class=razmak href=Privatno/korisnici.php>Korisnici</a>";
                echo "<a class=razmak href=ustanove.php>Ustanove</a>";
                echo "<a class=razmak href=Dokumentacija.html>Dokumentacija</a>";
                echo "<a class=razmak href=o_autoru.html>O autoru</a>";
            }
            if ($_SESSION["tip"] == 1) {
                echo "<a class=razmak href=A_odBlokirajKorisnika.php>Admin</a>";
            }
            if ($_SESSION["tip"] == 2) {
                echo "<a class=razmak href=index.php>Početna stranica</a>";
                echo "<a class=razmak href=M_kreirajVrstu.php>Kreiraj vrstu oglasa</a>";
                echo "<a class=razmak href=M_zahtjeviZaBlok.php>Zahtjevi za blokiranje</a>";
                echo "<a class=razmak href=M_zahtjeviZaOglasima.php>Zahtjevi za oglasima</a>";
                echo "<a class=razmak href=odjava.php>Odjava</a>";
                echo "<a class=razmak href=o_autoru.html>O autoru</a>";
            }
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

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <br>
        <div><form class="registracija" id="registracija" method="post" name="formaRegistracije" action="Registracija.php">               
                <label class="labela" for="ime">Ime: </label>
                <input class="textbox" type="text" id="ime" name="ime" size="20" maxlength="30" placeholder="Ime"><br><br>
                <label class="labela" for="prez">Prezime: </label>
                <input class="textbox" type="text" id="prezime" name="prezime" size="20" maxlength="50" placeholder="Prezime" ><br><br>
                <label class="labela" for="korime2">Korisničko ime: </label>
                <input class="textbox" type="text" id="korime2" name="korime2" size="20" maxlength="20"  placeholder="korisničko ime" ><br><br>
                <label class="labela" for="email">Email adresa: </label>
                <input class="textbox" type="email" id="email" name="email" size="35" maxlength="35" placeholder="ime.prezime@posluzitelj.xxx" ><br><br>
                <label class="labela" for="lozinka1">Lozinka: </label>
                <input class="textbox" type="password" id="lozinka1" name="lozinka1" size="20" maxlength="20"  placeholder="lozinka" ><br><br>
                <label class="labela" for="lozinka2">Ponovi lozinku: </label>
                <input class="textbox" type="password" id="lozinka2" name="lozinka2" size="15" maxlength="15"  placeholder="lozinka" ><br>    <br>                 
                <div class="captcha" style="background-image: url('Slike/captcha.png'); background-size: contain; margin-left: 46%; margin-right: 46%;">
                    <p><?php echo $captcha; ?></p>
                </div>
                <label class="labela" for="kapca">Captcha</label>
                <input class="textbox" type="text" id="kapca" name="odgovor" size="10" maxlength="10"><br><br>
                <input type="hidden" name="rešenje" value="<?php echo $captcha ?>">
                <input class="gumbi" id="regis" name="submit2" type="submit" value=" Registriraj se ">

            </form>
            <?php
            echo $imeErr;
            echo $prezimeErr;
            echo $korisimeErr;
            echo $lozinkaErr;
            echo $potlozinkaErr;
            echo $gradErr;
            echo $danErr;
            echo $emailErr;
            echo $captchaErr;
            ?>
        </div>
        <div style="text-align: center" id="petiOglas">

        </div> 
        <br>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>

