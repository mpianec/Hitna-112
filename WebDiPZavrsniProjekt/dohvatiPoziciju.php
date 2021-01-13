<?php
include('baza.class.php');
$baza = new Baza();
$baza->spojiDB();
$ids = $_GET['pr'];
$sql = "select idPozicija,naziv from Pozicija where Stranica_idStranica=$ids";
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


