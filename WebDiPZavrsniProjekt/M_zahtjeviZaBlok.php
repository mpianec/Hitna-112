<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Blokiranje oglasa</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Blokiranje oglasa">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="oglasi.js" type="text/javascript">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
    <body>
        <header>
            <h1>Blokiranje oglasa</h1>
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


        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <?php
        include("baza.class.php");
        $baza = new Baza();
        $baza->spojiDB();
        /* $naziv = "";
          $slika = "";
          $id = 0;
          $visina = 0;
          $sirina = 0; */

        $sql = "SELECT Oglas.naziv, Oglas.slika, Oglas.oglas_id, Oglas.Korisnik_korisnik_id, Zahtjev_za_blokiranje_oglasa.razlog_blokiranja, Zahtjev_za_blokiranje_oglasa.Oglas_oglas_id, Zahtjev_za_blokiranje_oglasa.Korisnik_korisnik_id
FROM Oglas, Zahtjev_za_blokiranje_oglasa
WHERE Oglas.oglas_id = Zahtjev_za_blokiranje_oglasa.Oglas_oglas_id and Oglas.Status='Aktivan'";
        $rez = $baza->selectDB($sql);
        if (empty($rez)) {
            print("Nema zahtjeva");
        } else {
            $lista = array();
            while ($red = $rez->fetch_assoc()) {
                $lista[] = array(
                    "naziv" => $red["naziv"],
                    "slika" => $red["slika"],
                    "oglas_id" => $red["oglas_id"],
                    "Korisnik_korisnik_id" => $red["Korisnik_korisnik_id"],
                    "razlog_blokiranja" => $red["razlog_blokiranja"]
                );
            }
           
            $nesto = "";
            for ($i = 0; $i < count($lista); $i++) {
                $nesto .= "<form method=post name=zahtjev$i id=zahtjev$i action=M_zahtjeviZaBlok.php>";
                $nesto .= "<p>" . $lista[$i]['naziv'] . "</p>";
                $nesto .= "<figure><img src=\"" . $lista[$i]['slika'] . "\" height=\"100\" width=\"100\"></figure>";
                $nesto .= "<p>" . $lista[$i]['razlog_blokiranja'] . "</p>";
                $nesto .= "<input type=submit name=blokiraj$i id=blokiraj$i value=\"Blokiraj oglas\">";
                $nesto .= "<input type=submit name=odbij$i id=odbij$i value=\"Odbij blok\">";
                $nesto .= "</form>";
                if (isset($_POST['blokiraj' . $i])) {

                    $sql = "update Oglas set Status='Blokiran' where oglas_id=" . $lista[$i]['oglas_id'];
                    $baza->updateDB($sql);
                    $sqlKorisnik = "select email from Korisnik where korisnik_id=" . $lista[$i]['Korisnik_korisnik_id'];
                    $rez = $baza->selectDB($sqlKorisnik);
                    while ($red2 = $rez->fetch_array()) {
                        $email = $red2["email"];
                    }
                    $mail_to = $email;
                    $mail_from = "FROM: Hitna-112";
                    $mail_subject = "Blokiranje oglasa.";
                    $time = time();
                    $mail_body = "Vaš oglas je blokiran iz razloga: " . $lista[$i]['razlog_blokiranja'];
                    mail($mail_to, $mail_subject, $mail_body, $mail_from);
                    echo $email;
                    $vrijeme = date('Y-m-d H:i:s');
                    $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Blokiranje','Moderator je blokirao oglas.',$_SESSION[idKorisnik])";
                    $baza->updateDB($sqlDnevnik);
                }
                if (isset($_POST['odbij' . $i])) {
                    $sql = "update Oglas set Status='Aktivan' where oglas_id=" . $lista[$i]['oglas_id'];
                    $baza->updateDB($sql);
                }
            }
            echo $nesto;
        }
        $baza->zatvoriDB();
        ?>

        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>

