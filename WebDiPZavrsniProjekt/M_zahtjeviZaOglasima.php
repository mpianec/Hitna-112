<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Aktivacija oglasa</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Aktivacija oglasa">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="oglasi.js" type="text/javascript">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
    <body>
        <header>
            <h1>Aktivacija oglasa</h1>
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
        include("baza.class.php");
        $baza = new Baza();
        $baza->spojiDB();       
        $sql = "select Pozicija.idPozicija,Oglas.naziv,Oglas.slika,Oglas.oglas_id from Oglas,Pozicija where Oglas.Status='Neaktivan' AND Oglas.Pozicija_idPozicija = Pozicija.idPozicija AND Pozicija.Korisnik_korisnik_id =$_SESSION[idKorisnik]";
        $rez = $baza->selectDB($sql);
        $lista = array();
        while ($red = $rez->fetch_assoc()) {
            $lista[] = array(
                "naziv" => $red["naziv"],
                "slika" => $red["slika"],
                "oglas_id" => $red["oglas_id"]
            );
        }
        $nesto = "";
        for ($i = 0; $i < count($lista); $i++) {
            $nesto .= "<form method=post name=zahtjev$i id=zahtjev$i action=M_zahtjeviZaOglasima.php>";
            $nesto .= "<p>" . $lista[$i]['naziv'] . "</p>";
            $nesto .= "<figure><img src=\"" . $lista[$i]['slika'] . "\" height=\"100\" width=\"100\"></figure>";
            $nesto .= "<input type=submit name=zahtjevaj$i id=zahtjevaj$i value=\"Aktiviraj oglas\">";
            $nesto .= "<input type=submit name=odbij$i id=odbij$i value=\"Odbij oglas\">";
            $nesto .= "</form>";
            if (isset($_POST['zahtjevaj' . $i])) {
                $sql = "update Oglas set Status='Aktivan' where oglas_id=" . $lista[$i]['oglas_id'];
                $baza->updateDB($sql);
                $vrijeme = date('Y-m-d H:i:s');
                $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Prihvaćen oglas','Moderator je prihvatio zahtjev za oglas.',$_SESSION[idKorisnik])";
                $baza->updateDB($sqlDnevnik);
            }
            if (isset($_POST['odbij' . $i])) {
                $sql = "update Oglas set Status='Odbijen' where oglas_id=" . $lista[$i]['oglas_id'];
                $baza->updateDB($sql);
            }
        }
        echo $nesto;
        $baza->zatvoriDB();
        ?>

        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
