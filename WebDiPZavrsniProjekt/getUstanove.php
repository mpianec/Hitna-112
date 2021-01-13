<?php
include('baza.class.php');
header ("Content-Type: application/json; charset=UTF-8");
$sql="select naziv,adresa from Ustanove";
$baza=new Baza();
$rezultat=$baza->selectDB($sql);
$lista=array();
while(list($naziv,$adresa)=$rezultat->fetch_array()){
    $lista[]=array(
        "naziv"=>$naziv,
        "adresa"=>$adresa
    );
}
echo json_encode($lista);
?>
