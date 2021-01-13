<?php
include('baza.class.php');
$baza = new Baza();
$baza->spojiDB();
$id=$_GET['par'];
$sql = "SELECT datum, opis, adresa, slika FROM Nesreća WHERE Ustanove_ustanove_id =$id";
$rez = $baza->selectDB($sql);
$lista = array();
while (list($datum,$opis,$adresa,$slika) = $rez->fetch_array()) {
    $lista[] = array(
        "datum"=>$datum,
        "opis"=>$opis,
        "adresa"=>$adresa,
        "slika"=>$slika
    );
}
$baza->zatvoriDB();
echo json_encode($lista);
?>

