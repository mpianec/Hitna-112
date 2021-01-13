<?php
session_start();

?>


<!DOCTYPE html>
<html>
    <head>
    <title>Moji oglasi</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Moji oglasi">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="zahtjevZaOglas.js" type="text/javascript">
        </script>
       
    </head>
    <body>
        <header>
            <h1>Moji oglasi</h1>
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

        
        <?php 
        include("baza.class.php");
        $baza = new Baza();
        $baza->spojiDB();
        
        $sql="select naziv,slika,oglas_id from Oglas  where Korisnik_korisnik_id=$_SESSION[idKorisnik]";
        $rez = $baza->selectDB($sql);
        $lista = array();
        while ($red = $rez->fetch_assoc()) {
            $lista[] = array(
                "naziv" => $red["naziv"],
                "slika" => $red["slika"],
                "oglas_id" => $red["oglas_id"]
            );
        }
        $nesto="";
         for ($i = 0; $i < count($lista); $i++) {
            $nesto .= "<form method=post name=zahtjev id=zahtjev$i action=R_mojiOglasi.php>";
            $nesto .= "<p>" . $lista[$i]['naziv'] . "</p>";
            $nesto .= "<figure><img src=\"" . $lista[$i]['slika'] . "\" height=\"100\" width=\"100\"></figure>";
            $nesto.="<input type=textbox placeholder=\"Novi naziv\" id=naziv$i name=naziv$i><br>";
            $nesto.="<input   type=textbox placeholder=\"Novi url \" id=url$i name=url$i><br>";
            $nesto.="<input type=textbox placeholder=\"Nova slika\" id=slika$i name=slika$i><br>";
            $nesto.="<input type=textbox placeholder=\"Novi opis\" id=opis$i name=opis$i><br>";
            $nesto.="<input  type=submit name=ažuriraj$i id=ažuriraj$i value=\"Ažuriraj oglas\">";
     
            $nesto .= "</form>";           
            if(isset($_POST["ažuriraj".$i])){
                $sql2="update Oglas set naziv='".$_POST['naziv'.$i]."',slika='".$_POST['slika'.$i]."',url='".$_POST['url'.$i]."',opis='".$_POST['opis'.$i]."' where oglas_id=".$lista[$i]['oglas_id'];
                $baza->updateDB($sql2);
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