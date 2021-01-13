<?php

require_once './baza.class.php';

function dohvatiVrijeme() {
    $json = file_get_contents("http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=json");
    $dat = json_decode($json, true);
    $brojSati = $dat["WebDiP"]["vrijeme"]["pomak"]["brojSati"];

    $baza = new Baza();
    $baza ->spojiDB();
    $sql = "Update PomakVremena set pomakVremena='$brojSati'";
    $baza ->updateDB($sql);
    $baza ->zatvoriDB();
}

function pomakVremena() {
    $baza  = new Baza();
    $baza ->spojiDB();
    $sql = "SELECT pomakVremena from PomakVremena";
    $rez = $baza ->selectDB($sql);
    $red = $rez->fetch_assoc();
    $baza->zatvoriDB();
    $brojSati = $red["pomakVremena"];
    $sad = time();
    $virtualno = $sad + $brojSati * 3600;
    return date("Y-m-d H:i:s", $virtualno);
}
