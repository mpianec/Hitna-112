<?php
session_start();
$id=$_SESSION["idKorisnik"];
include('baza.class.php');
$baza=new Baza();
$baza->spojiDB();

$oglas_id=$_GET['par1'];
$razlog=$_GET['par2'];
$sql="insert into Zahtjev_za_blokiranje_oglasa (razlog_blokiranja,Oglas_oglas_id,Korisnik_korisnik_id) values('$razlog',$oglas_id,$id)";
$baza->updateDB($sql);
$baza->zatvoriDB();
?>