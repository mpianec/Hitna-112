<?php
include("baza.class.php");
$bp = new Baza();
$bp->spojiDB();
session_start();
$vrijeme=date('Y-m-d H:i:s');
$sqlDnevnik="insert into dnevnikRada (vrijeme_pristupa,tip_loga,opis,Korisnik_korisnik_id) values ('$vrijeme','Odjava korisnika','Odjava korisnika iz sustav',$_SESSION[idKorisnik])";
$bp->updateDB($sqlDnevnik);
session_destroy();
$_SESSION = array();
header("Location:Prijava.php");
?>
