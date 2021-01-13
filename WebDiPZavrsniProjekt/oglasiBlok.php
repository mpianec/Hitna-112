<?php
include('baza.class.php');
$baza=new Baza();
$baza->spojiDB();
$sql="select oglas_id,Korisnik_korisnik_id,naziv,slika from Oglas where Status='Aktivan'";
$rez=$baza->selectDB($sql);
$lista=array();
while(list($idOglas,$idKorisnik,$naziv,$slika)=$rez->fetch_array()){
    $lista[]=array(
        "oglas_id"=>$idOglas,
        "korisnik_id"=>$idKorisnik,
        "naziv"=>$naziv,
        "slika"=>$slika
    );
}

$baza->zatvoriDB();
echo json_encode($lista);
?>