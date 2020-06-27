// Dadas la division que contiene todas las pestañas y la de la pestaña que se
// quiere mostrar, la funcion oculta todas las pestañas a excepcion de esa.
function cambiarPestanna(pestannas, pestanna) {
    // Obtiene los elementos con los identificadores pasados.

    var cpestana1 = document.getElementById("cpestana1");
    var cpestana2 = document.getElementById("cpestana2");
    var cpestana3 = document.getElementById("cpestana3");
    var cpestana4 = document.getElementById("cpestana4");
    var cpestana = [
        "cpestana1",
        "cpestana2",
        "cpestana3",
        "cpestana4",
        "cpestana5",
        "cpestana6",
        "cpestana7",
        "cpestana8",
        "cpestana9",
    ];
    var Titulos = [
        "Documentos por Visto Bueno..",
        "Documentos bajo su Dirección...",
        "Monografías/Poster para Evaluar",
        "Anteproyectos para Evaluar...",
        "Proyectos para Evaluar",
        "Documentos Evaluados...",
        "Actas de Comité",
        "Actualización de Datos",
        "Ayuda",
    ];

    pestanna = document.getElementById(pestanna.id);
    listaPestannas = document.getElementById(pestannas.id);

    // Obtiene las divisiones que tienen el contenido de las pestañas.
    cpestanna = document.getElementById("c" + pestanna.id);
    var pestanaid = "c" + pestanna.id;
    listacPestannas = document.getElementById("contenido" + pestannas.id);

    i = 0;
    // Recorre la lista ocultando todas las pestañas y restaurando el fondo
    // y el padding de las pestañas.
    while (typeof listacPestannas.getElementsByTagName("div")[i] != "undefined") {
        //  $(document).ready(function() {
        //cpestanna

        //  $(listacPestannas.getElementsByTagName("div")[i]).css("display", "none");
        $(listaPestannas.getElementsByTagName("li")[i]).css("background", "");
        $(listaPestannas.getElementsByTagName("li")[i]).css("padding-bottom", "");
        i += 1;
        // });
    }

    //  if ((cpestanna.style.display = "none")) {
    for (var cont = 0; cont < cpestana.length; cont++) {
        var petananone = document.getElementById(cpestana[cont]);
        if (pestanaid == cpestana[cont]) {
            if ((petananone.style.display = "none")) {
                cpestanna.style.display = "block";

                var txt = document.getElementById("Text");
                var guia = document.getElementById("Guia");

                txt.innerHTML = Titulos[cont];
                guia.innerHTML = Titulos[cont];
                // console.log(txt.innerHTML);
            }
        } else {
            cpestanna.style.display = "none";

            petananone.style.display = "none";
        }
    }
    //  } else {
    //     cpestanna.style.display = "none";
    // }

    $(document).ready(function () {
        // Muestra el contenido de la pestaña pasada como parametro a la funcion,
        // cambia el color de la pestaña y aumenta el padding para que tape el
        // borde superior del contenido que esta juesto debajo y se vea de este
        // modo que esta seleccionada.
        $(cpestanna).css("display", "");
        $(pestanna).css("background", "#343a40");


        //  $(pestanna).css("padding-bottom", "2px");
    });


    $(".loader").fadeOut("slow");


    //console.log("Ahora");
}