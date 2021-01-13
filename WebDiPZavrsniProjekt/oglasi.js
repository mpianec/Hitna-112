addEventListener("load", function (event) {
    kreirajDogadaje();
});
function kreirajDogadaje() {
    var id = new Array();
    var url = new Array();
    var slika = new Array();
    var sirina = new Array();
    var visina = new Array();
    var status = new Array();
    var text = "";
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var oglas1 = JSON.parse(this.responseText);
            $.each(oglas1, function (key, value) {
                id.push(value['id']);
                url.push(value['url']);
                slika.push(value['slika']);
                sirina.push(value['sirina']);
                visina.push(value['visina']);
                status.push(value['status']);
            });
            if (status[0] == "Blokiran") {
                text += "<p>Oglas je blokiran</p>";
                document.getElementById("prviOglas").innerHTML = text;
            } else if (status[0] == "Neaktivan") {
                text += "<p>Oglas nije aktivan</p>";
                document.getElementById("prviOglas").innerHTML = text;
            } else {
                PrikaziOglas1();
            }
        } else {

        }

    };
    xmlhttp.open("GET", "dohvatiOglase.php?parametar=1", true);
    xmlhttp.send();

    function PrikaziOglas1() {

        document.getElementById("prviOglas").setAttribute("height", visina[0]);
        document.getElementById("prviOglas").setAttribute("width", sirina[0]);
        document.getElementById("prviOglas").setAttribute("text-align", "center");
        text += "<a class=\"oglas\" id=\"" + id[0] + "\" href=\"" + url[0] + "\"><figure><img src=\"" + slika[0] + "\" height=\"" + visina[0] + "\" width=\"" + sirina[0] + "\"></figure></a>"
        document.getElementById("prviOglas").innerHTML = text;
    }
    $(document).on('click', '.oglas', function () {

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.open("GET", "oglasKlikovi.php?parametar=" + this.id, true);
        xmlhttp.send();
    });
       
    var id2 = new Array();
    var url2 = new Array();
    var slika2 = new Array();
    var sirina2 = new Array();
    var visina2 = new Array();
    var status2 = new Array();
    var text2 = "";
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var oglas2 = JSON.parse(this.responseText);
            $.each(oglas2, function (key, value) {
                id2.push(value['id']);
                url2.push(value['url']);
                slika2.push(value['slika']);
                sirina2.push(value['sirina']);
                visina2.push(value['visina']);
                status2.push(value['status']);
            });
            if (status2[0] == "Blokiran") {
                text2 += "<p>Oglas je blokiran</p>";
                document.getElementById("drugiOglas").innerHTML = text2;
            } else if (status2[0] == "Neaktivan") {
                text2 += "<p>Oglas nije aktivan</p>";
                document.getElementById("drugiOglas").innerHTML = text2;
            } else {
                PrikaziOglas2();
            }
        } else {

        }

    };
    xmlhttp.open("GET", "dohvatiOglase.php?parametar=2", true);
    xmlhttp.send();
    function PrikaziOglas2() {
        var text2 = "";
        document.getElementById("drugiOglas").setAttribute("height", visina2[0]);
        document.getElementById("drugiOglas").setAttribute("width", sirina2[0]);
        document.getElementById("drugiOglas").setAttribute("text-align", "center");
        text2 += "<a class=\"oglas\" id=\"" + id2[0] + "\" href=\"" + url2[0] + "\"><figure><img src=\"" + slika2[0] + "\" height=\"" + visina2[0] + "\" width=\"" + sirina2[0] + "\"></figure></a>";
        document.getElementById("drugiOglas").innerHTML = text2;
    }
    var id3 = new Array();
    var url3 = new Array();
    var slika3 = new Array();
    var sirina3 = new Array();
    var visina3 = new Array();
    var status3 = new Array();
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var oglas3 = JSON.parse(this.responseText);
            $.each(oglas3, function (key, value) {
                id3.push(value['id']);
                url3.push(value['url']);
                slika3.push(value['slika']);
                sirina3.push(value['sirina']);
                visina3.push(value['visina']);
                status3.push(value['status']);
            });
            if (status3[0] == "Blokiran") {
                text += "<p>Oglas je blokiran</p>";
                document.getElementById("treciOglas").innerHTML = text;
            } else if (status3[0] == "Neaktivan") {
                text += "<p>Oglas nije aktivan</p>";
                document.getElementById("treciOglas").innerHTML = text;
            } else {
                PrikaziOglas3();
            }
        } else {

        }

    };
    xmlhttp.open("GET", "dohvatiOglase.php?parametar=3", true);
    xmlhttp.send();
    function PrikaziOglas3() {
        var text3 = "";
        document.getElementById("treciOglas").setAttribute("height", visina3[0]);
        document.getElementById("treciOglas").setAttribute("width", sirina3[0]);
        document.getElementById("treciOglas").setAttribute("text-align", "center");
        text3 += "<a class=\"oglas\" id=\"" + id3[0] + "\" href=\"" + url3[0] + "\"><figure><img src=\"" + slika3[0] + "\" height=\"" + visina3[0] + "\" width=\"" + sirina3[0] + "\"></figure></a>";
        document.getElementById("treciOglas").innerHTML = text3;
    }
    var id4 = new Array();
    var url4 = new Array();
    var slika4 = new Array();
    var sirina4 = new Array();
    var visina4 = new Array();
    var status4 = new Array();
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var oglas4 = JSON.parse(this.responseText);
            $.each(oglas4, function (key, value) {
                id4.push(value['id']);
                url4.push(value['url']);
                slika4.push(value['slika']);
                sirina4.push(value['sirina']);
                visina4.push(value['visina']);
                status4.push(value['status']);
            });
            if (status4[0] == "Blokiran") {
                text += "<p>Oglas je blokiran</p>";
                document.getElementById("cetvrtiOglas").innerHTML = text;
            } else if (status4[0] == "Neaktivan") {
                text += "<p>Oglas nije aktivan</p>";
                document.getElementById("cetvrtiOglas").innerHTML = text;
            } else {
                PrikaziOglas4();
            }
        } else {

        }

    };
    xmlhttp.open("GET", "dohvatiOglase.php?parametar=4", true);
    xmlhttp.send();
    function PrikaziOglas4() {
        var text4 = "";
        document.getElementById("cetvrtiOglas").setAttribute("height", visina4[0]);
        document.getElementById("cetvrtiOglas").setAttribute("width", sirina4[0]);
        document.getElementById("cetvrtiOglas").setAttribute("text-align", "center");
        text4 += "<a class=\"oglas\" id=\"" + id4[0] + "\" href=\"" + url4[0] + "\"><figure><img src=\"" + slika4[0] + "\" height=\"" + visina4[0] + "\" width=\"" + sirina4[0] + "\"></figure></a>";
        document.getElementById("cetvrtiOglas").innerHTML = text4;
    }
    
    var id5 = new Array();
    var url5 = new Array();
    var slika5 = new Array();
    var sirina5 = new Array();
    var visina5 = new Array();
    var status5 = new Array();
    var text5 = "";
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var oglas5 = JSON.parse(this.responseText);
            $.each(oglas5, function (key, value) {
                id5.push(value['id']);
                url5.push(value['url']);
                slika5.push(value['slika']);
                sirina5.push(value['sirina']);
                visina5.push(value['visina']);
                status5.push(value['status']);
            });
            if (status5[0] == "Blokiran") {
                text += "<p>Oglas je blokiran</p>";
                document.getElementById("petiOglas").innerHTML = text;
            } else if (status5[0] == "Neaktivan") {
                text += "<p>Oglas nije aktivan</p>";
                document.getElementById("petiOglas").innerHTML = text;
            } else {
                PrikaziOglas5();
            }
        } else {

        }

    };
    xmlhttp.open("GET", "dohvatiOglase.php?parametar=10", true);
    xmlhttp.send();

    function PrikaziOglas5() {

        document.getElementById("petiOglas").setAttribute("height", visina5[0]);
        document.getElementById("petiOglas").setAttribute("width", sirina5[0]);
        document.getElementById("petiOglas").setAttribute("text-align", "center");
        text5 += "<a class=\"oglas\" id=\"" + id5[0] + "\" href=\"" + url5[0] + "\"><figure><img src=\"" + slika5[0] + "\" height=\"" + visina5[0] + "\" width=\"" + sirina5[0] + "\"></figure></a>"
        document.getElementById("petiOglas").innerHTML = text5;
    }
    
    var id6 = new Array();
    var url6 = new Array();
    var slika6 = new Array();
    var sirina6 = new Array();
    var visina6 = new Array();
    var status6 = new Array();
    var text6 = "";
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var oglas6 = JSON.parse(this.responseText);
            $.each(oglas6, function (key, value) {
                id6.push(value['id']);
                url6.push(value['url']);
                slika6.push(value['slika']);
                sirina6.push(value['sirina']);
                visina6.push(value['visina']);
                status6.push(value['status']);
            });
            if (status6[0] == "Blokiran") {
                text += "<p>Oglas je blokiran</p>";
                document.getElementById("sestiOglas").innerHTML = text;
            } else if (status6[0] == "Neaktivan") {
                text += "<p>Oglas nije aktivan</p>";
                document.getElementById("sestiOglas").innerHTML = text;
            } else {
                PrikaziOglas6();
            }
        } else {

        }

    };
    xmlhttp.open("GET", "dohvatiOglase.php?parametar=11", true);
    xmlhttp.send();

    function PrikaziOglas6() {

        document.getElementById("sestiOglas").setAttribute("height", visina6[0]);
        document.getElementById("sestiOglas").setAttribute("width", 6[0]);
        document.getElementById("sestiOglas").setAttribute("text-align", "center");
        text6 += "<a class=\"oglas\" id=\"" + id6[0] + "\" href=\"" + url6[0] + "\"><figure><img src=\"" + slika6[0] + "\" height=\"" + visina6[0] + "\" width=\"" + sirina6[0] + "\"></figure></a>"
        document.getElementById("sestiOglas").innerHTML = text6;
    }
}

