addEventListener("load", function (event) {
    kreirajDogadaje();
});
function kreirajDogadaje() {
    document.getElementById("stranica").addEventListener("focusout", function (event) {

        if (document.getElementById("stranica").value === "") {

        } else {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                
                if (this.readyState == 4 && this.status == 200) {
                    var pozicije = JSON.parse(this.responseText);
                    var txt = "";
                    $.each(pozicije, function (key, value) {
                        txt += "<option value=\"" + value['id'] + "\">" + value['naziv'] + "</option>";
                    });
                    document.getElementById("pozicije").innerHTML = txt;

                }
                ;

            };
            xmlhttp.open("GET", "dohvatiPoziciju.php?pr=" + document.getElementById("stranica").value, true);
            xmlhttp.send();
        }
    }
    );
    document.getElementById("pozicije").addEventListener("focusout", function (event) {

        if (document.getElementById("pozicije").value === "") {

        } else {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                
                if (this.readyState == 4 && this.status == 200) {
                    var vrsta = JSON.parse(this.responseText);
                    var txt = "";
                    $.each(vrsta, function (key, value) {
                        txt += "<option value=\"" + value['id'] + "\">" + value['naziv'] + "</option>";
                    });
                    document.getElementById("vrstaOglasa").innerHTML = txt;

                }
                ;

            };
            xmlhttp.open("GET", "dohvatiVrstuOglasa.php?pr2=" + document.getElementById("pozicije").value, true);
            xmlhttp.send();
        }
    }
    );
}


