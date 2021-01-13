<?php
$q=$_GET['q'];
$server = "localhost";
$korisnik = "WebDiP2017x115";
$lozinka = "admin_R67j";
$baza = "WebDiP2017x115";


$con= mysqli_connect($server, $korisnik, $lozinka, $baza);
mysqli_select_db($con, $baza);
$sql="select * from `Korisnik` where `korisnicko_ime`='".$q."'";
$rezultat=mysqli_query($con,$sql);
while($red= mysqli_fetch_array($rezultat)){
    if($red["korisnicko_ime"]==$q){
        echo "Greška";
    }
}
mysqli_close($con);
?>