addEventListener("load", function (event) {
    kreirajDogadaje2();
});
function kreirajDogadaje2() {
    var data;
    var naziv = new Array();
    var adresa = new Array();
    var brojIspisanih = 0;
    var id = new Array();
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);
            $.each(data, function (key, value) {
                id.push(value['id']);
                naziv.push(value['naziv']);
                adresa.push(value['adresa']);
            });
            dohvatiUstanove();
        } else {
        }
    };
    xmlhttp.open("GET", "dohvatiUstanove.php", true);
    xmlhttp.send();

    function dohvatiUstanove() {
        var txt = "";
        for (var i = brojIspisanih; i < brojIspisanih + 5; i++) {
            txt += "<div style=\" text-align: center; width: 20%; margin-left: 40%; \"><p>Naziv ustanove: " + naziv[i] + "<br>Adresa: " + adresa[i] + "<br><input class=\"posaljiUzbuna\" id=\"" + id[i] + "\" type=\"button\" value=\"Prikaži uzbune\"></p><br><div id=\"div" + id[i] + "\"> </div></div>";

        }
        brojIspisanih += 5;
        document.getElementById("listaUstanova").innerHTML = txt;
    }
    $("#prethodnaStranica").click(function (event) {
        brojIspisanih -= 10;
        dohvatiUstanove();
    });
    $("#sljedecaStranica").click(function (event) {
        dohvatiUstanove();
    });
    $("#prvaStranica").click(function (event) {
        brojIspisanih = 0;
        dohvatiUstanove();
    });
    $("#zadnjaStranica").click(function (event) {
        var lista = naziv.length % 5;
        if (lista === 0) {
            brojIspisanih = naziv.length - 5;
        } else {
            brojIspisanih = naziv.length - lista;
        }
        dohvatiUstanove();
    });
    var datum = new Array();
    var opis = new Array();
    var adresa2 = new Array();
    var slika = new Array();
    var uzbuna;


    $(document).on('click', '.posaljiUzbuna', function (event) {
        var idUzbuna=this.id;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
       
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                
                uzbuna = JSON.parse(this.responseText);
                $.each(uzbuna, function (key, value) {
                    datum.push(value['datum']);
                    opis.push(value['opis']);
                    adresa2.push(value['adresa']);
                    slika.push(value['slika']);
                    
                
                });
                
                var txt2 = "";
                for (var i = 0; i < datum.length; i++) {
                    txt2 += "<figure><img src=\"Uzbune/" + slika[i] + "\" height=\"150px\" width=\"150px\"></figure><br><p>Datum:" + datum[i] + "<br>Opis:" + opis[i] + "<br>Adresa:" + adresa2[i] + " </p>";
                    document.getElementById("div" + idUzbuna).innerHTML = txt2;
                }
                
            } else {
            }
        };
        xmlhttp.open("GET", "dohvatiUzbunu.php?par=" + this.id, true);
        xmlhttp.send();

        
    });


}
