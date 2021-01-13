<?php
session_start();
function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();
if (isset($_POST['moderniši'])) {
    $sql2 = "update Korisnik set Uloga_uloga_id=2 where korisnicko_ime='$_POST[obični]'";
    $baza->updateDB($sql2);
    $vrijeme = date('Y-m-d H:i:s');
    $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Kreiranje','Administrator je kreirao moderatora.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}

$ime=0;
$ustanova=0;
if (isset($_GET['spoji'])) {    
    $moder=$_GET['moder'];
    $ustan=$_GET['ustan'];
    
    $sqlIme="select `korisnik_id` from `Korisnik` where `korisnicko_ime`='$moder'";
    $sqlUstanova="select `ustanove_id` from `Ustanove` where `naziv`='$ustan'";
    $rezIme=$baza->selectDB($sqlIme);
    $rezUstanova=$baza->selectDB($sqlUstanova);
    while($red=$rezIme->fetch_array()){
        $ime=$red['korisnik_id'];
    }
    while($redi=$rezUstanova->fetch_array()){
        $ustanova=$redi['ustanove_id'];
    }
    
    $sql3 = "insert into `Moderira` (`Korisnik_korisnik_id`,`Ustanove_ustanove_id`) values($ime,$ustanova)";
    $baza->updateDB($sql3);
    
    $vrijeme = date('Y-m-d H:i:s');
    $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Kreiraj','Administrator je dodijelio moderatora ustanovi.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}
if(isset($_POST['dodajZgradu'])){
    $sqlZgrada="insert into Ustanove (naziv,adresa) values('$_POST[nazivUstanove]','$_POST[adresaUstanove]')";
    $baza->updateDB($sqlZgrada);
    $vrijeme = date('Y-m-d H:i:s');
    $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Kreiraj','Administrator je kreirao ustanovu.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Moderatori i ustanove</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Moderatori i ustanove">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
            <h1>Moderatori i ustanove</h1>
        </header>
        <nav style="background-color: skyblue; height: 30px">
            <a class="razmak" href="index.php">Početna stranica</a>
            <a class="razmak" href="Prijava.php">Prijava</a>
            <a class="razmak" href="Registracija.php">Registracija</a>
            <a class="razmak" href="odjava.php">Odjava</a>
            <a class="razmak" href="Privatno/korisnici.php">Korisnici</a> 
            <a class="razmak" href="ustanove.php">Ustanove</a>
            <a class="razmak" href="Dokumentacija.html">Dokumentacija</a>
            <a class="razmak" href="o_autoru.html">O autoru</a>
            <?php if($_SESSION["idKorisnik"]==1){echo "<a class=razmak href=A_odBlokirajKorisnika.php>Admin</a>";}           
            ?>            
        </nav>  
        <div id="google_translate_element"></div>

        <h2>Moderatori</h2>
        <form id="moder" method="post" name="moder" action="moderatorIUstanove.php">
            <label class="labela" for="obični">Svi korisnici</label>
            <select class="textbox" name="obični">
                <option>Odaberi korisnika</option>
                <?php
                $sql = "select korisnicko_ime from Korisnik where Uloga_uloga_id=3";
                $result = $baza->selectDB($sql);
                while ($red = mysqli_fetch_array($result)) {
                    echo "<option value=" . $red['korisnicko_ime'] . ">" . $red['korisnicko_ime'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input class="gumbi" type="submit" name="moderniši" value="Promakni korisnika u moderatora">
        </form>
        <br>
        <form id="dodjelamoder" method="get" name="dodejlamoder" action="moderatorIUstanove.php">
            <label class="labela" for="moderatori">Moderatori</label>
            <select class="textbox" name="moder">
                <option>Odaberi moderatora</option>
                <?php
                $sqlModer = "select korisnicko_ime from Korisnik where Uloga_uloga_id=2";
                $resultModer = $baza->selectDB($sqlModer);
                while ($red1 = mysqli_fetch_array($resultModer)) {
                    echo "<option value=" . $red1['korisnicko_ime'] . ">" . $red1['korisnicko_ime'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label class="labela" for="ustanove">Ustanove</label>
            <select class="textbox" name="ustan">
                <option>Odaberi ustanovu</option>
                <?php
                $sqlUstanova = "select * from `Ustanove`";
                $resultUstanova = $baza->selectDB($sqlUstanova);
                while ($red2 = $resultUstanova->fetch_array()) {
                    echo "<option >" . $red2['naziv']  . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input class="gumbi" type="submit" name="spoji" value="Dodjeli moderatora ustanovi">
        </form>
        <h2>Ustanove</h2>
        <form method="post" id="stvoriUstanovu" name="stvoriUstanovu" action="moderatorIUstanove.php">
            <label class="labela" for="nazivUstanove">Naziv ustanove: </label>
            <input class="textbox" id="nazivUstanove" name="nazivUstanove" placeholder="Naziv ustanove" size="30" maxlength="50">
            <label class="labela" for="adresaUstanove">Adresa ustanove:</label>
            <input class="textbox" id="adresaUstanove" name="adresaUstanove" placeholder="Adresa ustanove" size="30" maxlength="70"><br><br><br><br>
            <input class="gumbi" type="submit" value="Dodaj ustanovu" name="dodajZgradu" id="dodajZgradu"> 
        </form>
        <?php 
        $baza->zatvoriDB();
        ?>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>
