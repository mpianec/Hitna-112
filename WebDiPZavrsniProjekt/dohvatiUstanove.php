<?php
include('baza.class.php');
$baza = new Baza();
$baza->spojiDB();
$sql = "SELECT ustanove_id,naziv, adresa FROM Ustanove";
$rez = $baza->selectDB($sql);
$lista = array();
while (list($id,$naziv, $adresa) = $rez->fetch_array()) {
    $lista[] = array(
        "id"=>$id,
        "naziv"=>$naziv,
        "adresa"=>$adresa
    );
}
echo json_encode($lista);
?>
