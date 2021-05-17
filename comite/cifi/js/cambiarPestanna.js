// Dadas la division que contiene todas las pestañas y la de la pestaña que se
// quiere mostrar, la funcion oculta todas las pestañas a excepcion de esa.
function cambiarPestanna(pestannas, pestanna) {
    // Obtiene los elementos con los identificadores pasados.

    var cpestana1 = document.getElementById("cpestana1");
    var cpestana2 = document.getElementById("cpestana2");
    var cpestana3 = document.getElementById("cpestana3");
    var cpestana4 = document.getElementById("cpestana4");
    var cpestana = ["cpestana1", "cpestana2", "cpestana3", "cpestana4", "cpestana5"];
    var Titulos = [
        "VoBo",
        "Dirección",
        "Evaluar",
        "Evaluados",
        "Actas de comité"
    ];

    pestanna = document.getElementById(pestanna.id);
    listaPestannas = document.getElementById(pestannas.id);
    cpestanna = document.getElementById("c" + pestanna.id);
    var pestanaid = "c" + pestanna.id;
    // pestanaid = "cpestana" + localStorage.getItem("number" + 1);
    listacPestannas = document.getElementById("contenido" + pestannas.id);
    localStorage.setItem("number", 1);
    i = 0;
    while (typeof listacPestannas.getElementsByTagName("div")[i] != "undefined") {

        //  $(listacPestannas.getElementsByTagName("div")[i]).css("display", "none");
        $(listaPestannas.getElementsByTagName("li")[i]).css("background", "");
        $(listaPestannas.getElementsByTagName("li")[i]).css("padding-bottom", "");
        i += 1;
    }


    for (var cont = 0; cont < cpestana.length; cont++) {
        var petananone = document.getElementById(cpestana[cont]);

        if (pestanaid == cpestana[cont]) {
            localStorage.setItem("number", cont);
            if ((petananone.style.display = "none")) {
                cpestanna.style.display = "block";

                var Titulo = document.getElementById("Titulo");
                //  var guia = document.getElementById("Guia");

                Titulo.innerHTML = Titulos[cont];


                // guia.innerHTML = Titulos[cont];

                // console.log(txt.innerHTML);
            }
        } else {
            cpestanna.style.display = "none";

            petananone.style.display = "none";
        }
    }

    $(document).ready(function () {
        $(cpestanna).css("display", "");
        $(pestanna).css("background", "#B42A2A");
        //  $(pestanna).css("padding-bottom", "2px");
        ReloadsFrames();
    });

    //$(".loader").fadeOut("slow");
    document.getElementById("IdIconLoad").classList.add("d-none");
    document.getElementById("content").classList.remove("d-none");

    //
    document.getElementById("Titulo").classList.remove("d-none");
    document.getElementById("idTextCargando").classList.add("d-none");
}

function myfunction() {
    var Local = localStorage.getItem("number");
    if (Local !== null) {
        Local = parseInt(Local);
        Local = Local + 1;

        switch (Local) {
            case 1:
                cambiarPestanna(pestanas, pestana1);
                break;
            case 2:
                cambiarPestanna(pestanas, pestana2);
                break;
            case 3:
                cambiarPestanna(pestanas, pestana3);
                break;
            case 4:
                cambiarPestanna(pestanas, pestana4);
                break;
            case 5:
                cambiarPestanna(pestanas, pestana5);
                break;
            default: 1
                cambiarPestanna(pestanas, pestana1);
                break;
        }

    } else {

        cambiarPestanna(pestanas, pestana1);
    }
}





