<?php
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();
session_start();
function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

$korisnik = 0;
$stranica = 0;
if (isset($_POST['stvori'])) {
    $moder = $_POST['moderatori'];
    $stranice = $_POST['stranice'];
    $sqlModer = "select `korisnik_id` from `Korisnik` where `korisnicko_ime`='$moder'";
    $sqlStranica = "select `idStranica` from `Stranica` where `url`='$stranice'";
    $rezMod = $baza->selectDB($sqlModer);
    $rezStr = $baza->selectDB($sqlStranica);
    while ($red = $rezMod->fetch_array()) {
        $korisnik = $red['korisnik_id'];
    }
    while ($red2 = $rezStr->fetch_array()) {
        $stranica = $red2['idStranica'];
    }
    $sql2 = "insert into `Pozicija` (naziv,širina,visina,Stranica_idStranica,Korisnik_korisnik_id) values('$_POST[nazivPoz]','$_POST[sirinaPoz]','$_POST[visinaPoz]','$stranica','$korisnik')";
    $baza->updateDB($sql2);
    $vrijeme = date('Y-m-d H:i:s');
    $sqlDnevnik = "insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Kreiraj','Administrator je kreirao poziciju.',$_SESSION[idKorisnik])";
    $baza->updateDB($sqlDnevnik);
}
$dimenz = 0;
if (isset($_POST['menjaj'])) {
    $pozicije = $_POST['poze'];
    
    $sqlPoz = "select `idPozicija` from `Pozicija` where `naziv`='$_POST[poze]'";
    $rezPoz = $baza->selectDB($sqlPoz);
    
    while ($red4 = $rezPoz->fetch_array()) {
        $dimenz = $red4['idPozicija'];
    }
    
    $sql5 = "update `Pozicija` set `visina`='$_POST[novaVisina]',`širina`='$_POST[novaSirina]' where `idPozicija`='$dimenz'";
    $baza->updateDB($sql5);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stvaranje pozicije</title>
        <meta charset="utf-8">
        <link href="prijava.css" rel="stylesheet" type="text/css">
        <meta name="naslov" content="Stvaranje pozicije">
        <meta name="autor" content="Matija Pianec">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


    </head>
    <body>
        <header>
            <h1>Stvaranje pozicije</h1>
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


        <form id="pozic" method="post" name="pozicija" action="stvaranjePozicije.php">
            <label class="labela" for="moderatori">Moderatori</label>
            <select class="textbox" name="moderatori">
                <option>Odaberi moderatora</option>
                <?php
                $sql = "select korisnicko_ime from Korisnik where Uloga_uloga_id=2";
                $result = $baza->selectDB($sql);
                while ($red = mysqli_fetch_array($result)) {
                    echo "<option value=" . $red['korisnicko_ime'] . ">" . $red['korisnicko_ime'] . "</option>";
                }
                ?>
            </select>
            <label class="labela" for="stranice">Stranica</label>
            <select class="textbox" name="stranice">
                <?php
                $sql2 = "select url from Stranica";
                $result2 = $baza->selectDB($sql2);
                while ($red2 = mysqli_fetch_array($result2)) {
                    echo "<option value=" . $red2['url'] . ">" . $red2['url'] . "</option>";
                }
                ?>
            </select>
            <label class="labela" for="nazivPoz">Naziv pozicije</label>
            <input class="textbox" type="text" name="nazivPoz" id="nazivPoz" placeholder="Naziv">
            <label class="labela" for="sirinaPoz">Širina pozicije</label>
            <input class="textbox" type="number" name="sirinaPoz" min="0" id="sirinaPoz">
            <label class="labela" for="visinaPoz">Visina pozicije</label>
            <input class="textbox" type="number" name="visinaPoz" id="visinaPoz" min="0"><br><br>         
            <br><br><br><br><br><br><br><br>
            <input class="gumbi" type="submit" name="stvori" value="Stvori poziciju">          
        </form>
        <br><br><br>
        <h2>Mijenjaj dimenziju</h2>
        <form id="dimenzije" method="post" name="dimenzije" action="stvaranjePozicije.php">
            <label class="labela" for="novaSirina">Širina pozicije</label>
            <input class="textbox" type="number" name="novaSirina" min="0" id="novaSirina">
            <label class="labela" for="novaVisina">Visina pozicije</label>    
            <input class="textbox" type="number" name="novaVisina" id="novaVisina" min="0">
            <label class="labela" for="poze">Pozicija</label>
            <select class="textbox" name="poze">
                <?php
                $sql3 = "select naziv from Pozicija";
                $result3 = $baza->selectDB($sql3);
                while ($red3 = mysqli_fetch_array($result3)) {
                    echo "<option>" . $red3['naziv'] . "</option>";
                }
                ?>
            </select>
            <br><br><br><br><br><br>
            <input class="gumbi" type="submit" name="menjaj" value="Promijeni dimenzije">
        </form>
        <br><br><br><br><br><br><br><br>
        <?php 
        $baza->zatvoriDB();
        ?>
        <footer>
            <address>Kontakt: <a href="mailto:mpianec@foi.hr">Matija Pianec</a></address>
            <p>&copy; 2018 M.Pianec</p>
        </footer>
    </body>
</html>