<?php
header("Content-Type: application/json; charset=UTF-8");
include('baza.class.php');
$baza = new Baza();
$baza->spojiDB();
$id = $_GET['parametar'];
$sql = "SELECT  `Pozicija`.`širina`, `Pozicija`.`visina`, `Oglas`.`oglas_id`, `Oglas`.`url`, `Oglas`.`slika`,`Oglas`.`Status` FROM  `Pozicija` JOIN  `Oglas` ON  `Oglas`.`Pozicija_idPozicija`=`Pozicija`.`idPozicija` WHERE  `Pozicija`.`idPozicija`=$id";
$rez = $baza->selectDB($sql);
$lista = array();
while (list($sirina, $visina, $id, $url, $slika,$status) = $rez->fetch_array()) {
    $lista[] = array(
        "sirina" => $sirina,
        "visina" => $visina,
        "id" => $id,
        "url" => $url,
        "slika" => $slika,
        "status"=>$status
    );
}
echo json_encode($lista);
?>


