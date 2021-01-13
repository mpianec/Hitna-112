addEventListener("load", function (event) {
    kreirajDogadaje();
});
function kreirajDogadaje() {
    /* var valjanostEmaila = false;
     var ispravnostLozinke = false;
     var jednakostLozinka = false;
     var velikoSlovoIme = false;
     var velikoSlovoPrezime = false;
     var registracija = document.getElementById("registracija");*/

   /* var cookie=document.cookie;
    var a = new Date();
    if(cookie.length===0){
        alert("Prihvaćate uvjete korištenja.");
        a = new Date(a.getTime() +1000*60*60*24*2);
        document.cookie='uvjeti korištenja=0;expires='+a.toGMTString()+';';
    }*/

    var lozinka1 = document.getElementById("lozinka1");
    lozinka1.addEventListener("keyup", function (event) {
        var reg = new RegExp(/^[A-Za-z0-9$!?#]{8,}$/);
        var loz = document.getElementById("lozinka1").value;
        var provjera = reg.test(loz);
        if (provjera) {
            // ispravnostLozinke = true;
            document.getElementById("lozinka1").style.border = "2px";
            document.getElementById("lozinka1").style.borderColor = "green";
            document.getElementById("lozinka1").style.borderStyle = "solid";
        } else {
            document.getElementById("lozinka1").style.border = "2px";
            document.getElementById("lozinka1").style.borderColor = "red";
            document.getElementById("lozinka1").style.borderStyle = "solid";


        }
    });
    var lozinka2 = document.getElementById("lozinka2");
    lozinka2.addEventListener("keyup", function (event) {
        if (document.getElementById("lozinka2").value !== document.getElementById("lozinka1").value) {
            document.getElementById("lozinka2").style.border = "2px";
            document.getElementById("lozinka2").style.borderColor = "red";
            document.getElementById("lozinka2").style.borderStyle = "solid";
        } else {
            // jednakostLozinka = true;
            document.getElementById("lozinka2").style.border = "2px";
            document.getElementById("lozinka2").style.borderColor = "green";
            document.getElementById("lozinka2").style.borderStyle = "solid";
        }
    });
    var mail = document.getElementById("email");
    mail.addEventListener("keyup", function (event) {
        var reg2 = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
        var email = document.getElementById("email").value;
        var provjera2 = reg2.test(email);
        if (provjera2) {
            // valjanostEmaila = true;
            document.getElementById("email").style.border = "2px";
            document.getElementById("email").style.borderColor = "green";
            document.getElementById("email").style.borderStyle = "solid";
        } else {
            document.getElementById("email").style.border = "2px";
            document.getElementById("email").style.borderColor = "red";
            document.getElementById("email").style.borderStyle = "solid";
        }
    });
    var Ime = document.getElementById("ime");
    Ime.addEventListener("keyup", function (event) {
        var ime = document.getElementById("ime").value;
        var slovoIme = ime[0];
        var slovoVelikoIme = ime[0].toUpperCase();
        if (slovoIme === slovoVelikoIme) {
            //velikoSlovoIme = true;
            document.getElementById("ime").style.border = "2px";
            document.getElementById("ime").style.borderColor = "green";
            document.getElementById("ime").style.borderStyle = "solid";
        } else {
            document.getElementById("ime").style.border = "2px";
            document.getElementById("ime").style.borderColor = "red";
            document.getElementById("ime").style.borderStyle = "solid";
        }
    });
    var Prezime = document.getElementById("prezime");
    Prezime.addEventListener("keyup", function (event) {
        var prezime = document.getElementById("prezime").value;
        var slovoPrezime = prezime[0];
        var slovoVelikoPrezime = prezime[0].toUpperCase();
        if (slovoPrezime === slovoVelikoPrezime) {
            //velikoSlovoPrezime = true;
            document.getElementById("prezime").style.border = "2px";
            document.getElementById("prezime").style.borderColor = "green";
            document.getElementById("prezime").style.borderStyle = "solid";
        } else {
            document.getElementById("prezime").style.border = "2px";
            document.getElementById("prezime").style.borderColor = "red";
            document.getElementById("prezime").style.borderStyle = "solid";
        }
    });



    var korimeHTML = document.getElementById("korime2");
    korimeHTML.addEventListener("focusout", function (event) {
        if (korimeHTML.value === "") {
            document.getElementById("korime2").style.border = "2px";
            document.getElementById("korime2").style.borderStyle = "solid";
            document.getElementById("korime2").style.borderColor = "red";
            provjeraKorime = false;
        } else {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText === "Greška") {
                        document.getElementById("korime2").style.border = "2px";
                        document.getElementById("korime2").style.borderStyle = "solid";
                        document.getElementById("korime2").style.borderColor = "red";
                        provjeraKorime = false;

                    } else {
                        document.getElementById("korime2").style.border = "2px";
                        document.getElementById("korime2").style.borderStyle = "solid";
                        document.getElementById("korime2").style.borderColor = "green";
                        provjeraKorime = true;

                    }
                }
            };
            xmlhttp.open("GET", "AJAXProvjeraKorisnika.php?q=" + document.getElementById("korime2").value, true);
            xmlhttp.send();
        }
    });

}