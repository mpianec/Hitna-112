<?php
include('baza.class.php');
$baza = new Baza();
$baza->spojiDB();
$id=$_GET['parametar'];
$sql="update `Oglas` set `broj_klikova`=`broj_klikova`+1 where `oglas_id`=$id;";
$baza->updateDB($sql);
$baza->zatvoriDB();
?>

