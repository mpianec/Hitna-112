<?php
session_start();
if (isset($_POST["zaborav"])) {
    include("baza.class.php");
    $baza = new Baza();
    $sql = "select lozinka from Korisnik where korisnicko_ime='$_POST[korime]'and email='$_POST[email]'";
    $baza->spojiDB();
    $rez = $baza->selectDB($sql);
    $novaLozinka="";
    while (list($lozinka) = $rez->fetch_array()) {
        $trazena_lozinka = $lozinka;
    }

    function randomLozinka($duzina = 8) {
        $novaLozinka="";
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$?";
        for ($i = 0; $i < $duzina; $i++) {
            $novaLozinka .= $chars[mt_rand(0, strlen($chars)-1)];
        }

        return $novaLozinka;
    }

    $novaLozinka = randomLozinka(8);
    $sol=sha1(time());
    $kriptiranaLozinka=sha1($sol."-".$novaLozinka);
    $mail_to = $_POST["email"];
    $mail_from = "FROM: mpianec";
    $mail_subject = "Zaboravljena lozinka.";
    $mail_body = "Vaši podaci za prijavu su: Korisničko ime: $_POST[korime],Lozinka:$novaLozinka";
    mail($mail_to, $mail_subject, $mail_body, $mail_from);
    $sql2="Update Korisnik set Lozinka='$novaLozinka',sol='$sol',Kriptirana_lozinka='$kriptiranaLozinka' where korisnicko_ime='$_POST[korime]'";
    $baza->updateDB($sql2);
    $baza->zatvoriDB();
    header('Location: Prijava.php');
}
?>

<html>
    <head>
        <title>Zaboravljena lozinka</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Registracija">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="autor" content="Matija Pianec">
    </head>
    <body>
        <header>
            <h1>Zaboravljena lozinka</h1>
        </header>
        <nav style="background-color: skyblue; height: 30px">
            <a class="razmak" href="index.php">Početna stranica</a>
            <a class="razmak" href="Prijava.php">Prijava</a>
            <a class="razmak" href="Registracija.php">Registracija</a>
            <a class="razmak" href="odjava.php">Odjava</a>
            <a class="razmak" href="Privatno/korisnici.php">Korisnici</a>          
        </nav>  
        <div id="google_translate_element"></div>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <section>
            <h1>Upišite korisničko ime i email za povrat lozinke.</h1><br>
            <form method="post" id="prijava" action="zaboravljenaLozinka.php">
                <label class="labela" for="korime">Korisničko ime: </label>
                <input class="textbox" id="korime" type="text" name="korime"><br>
                <label class="labela" for="email">Email: </label>
                <input class="textbox" id="email" type="text" name="email"><br><br>
                <input class="gumbi" id="zaborav" name="zaborav" type="submit" value="Pošalji">
            </form>
        </section>
    </body>
</html>