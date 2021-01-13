
addEventListener("load", function (event) {
    kreirajDogadaje();
});
function kreirajDogadaje() {
    var naziv = new Array();
    var slika = new Array();
    var oglasId=new Array();
    var korisnikId=new Array();
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var oglasBlok = JSON.parse(this.responseText);
            $.each(oglasBlok, function (key, value) {
                naziv.push(value['naziv']);
                slika.push(value['slika']);
                oglasId.push(value['oglas_id']);
                korisnikId.push(value['korisnik_id'])
            });
            dohvatiOglase(naziv);
        } else {

        }

    };
    xmlhttp.open("GET", "oglasiBlok.php", true);
    xmlhttp.send();
    function dohvatiOglase(naziv) {
        var txt = "";
        for (var i = 0; i < naziv.length; i++) {
            txt += "<div><p>Naziv oglasa: " + naziv[i] + "<br>Slika: <figure><img src=\""+slika[i]+"\" height=\"100px\"  width=\"100px\"><br></figure></p><input class=\"razlog\" type=\"textbox\" id=\"razlog"+oglasId[i]+"\" name=\"razlog"+oglasId[i]+"\" placeholder=\"Unesite razlog blokiranja\"><br><input type=\"button\"  id=\""+oglasId[i]+"\"class=\"blokOglas\" value=\"Blokiranje oglasa\"><br></div>";

        }
        var nekaj=document.getElementById("listaOglasa");
        nekaj.innerHTML=txt;
    }
    
   
     $(document).on('click', '.blokOglas', function () {
        
        var oglid=this.id;
        var razlog=$("#razlog"+this.id).val();
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.open("GET", "updateZahtjevaZaBlokiranje.php?par1="+ oglid+"&par2="+razlog,true);
        xmlhttp.send();
    });
}

