<?php
include('baza.class.php');
$baza = new Baza();
$baza->spojiDB();
$ids = $_GET['pr2'];
$sql = "select idVrsta_oglasa,naziv from Vrsta_oglasa where Pozicija_idPozicija=$ids";
$rezult = $baza->selectDB($sql);
$lista = array();
while (list($id, $naziv) = $rezult->fetch_array()) {
    $lista[] = array(
        "id" => $id,
        "naziv" => $naziv
    );
}
$baza->zatvoriDB();
echo json_encode($lista);
?>
