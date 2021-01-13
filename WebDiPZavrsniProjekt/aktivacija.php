<?php
    include("baza.class.php");
if (isset($_GET['kljuc']) && $_GET['time'] > time() - 12 * 60 * 60) {

    $potvrda = $_GET['kljuc'];

    $bp = new Baza();

    $sqlProvjeraKljuca = "select korisnicko_ime,aktivacijski_kod from Korisnik";

    $bp->spojiDB();
    $rs = $bp->selectDB($sqlProvjeraKljuca);
    while (list($korime, $kljuc) = $rs->fetch_array()) {
        if ($potvrda == $kljuc) {
            $id = $korime;
            $sqlUpdate = "UPDATE Korisnik SET status = 1 WHERE korisnicko_ime = '$id'";
            $bp->updateDB($sqlUpdate);
            header('Location: Prijava.php');
        }
    }
    $rs->close();
    $bp->zatvoriDB();
} 
else {
    echo "Aktivacija neuspjesna";
}
?>
