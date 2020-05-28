// Dadas la division que contiene todas las pestañas y la de la pestaña que se
// quiere mostrar, la funcion oculta todas las pestañas a excepcion de esa.




function cambiarPestanna(pestannas, pestanna, number) {
    // Obtiene los elementos con los identificadores pasados.
  var cpestana = [];
    if(number == 3){
       cpestana = [
          "cpestana1",
          "cpestana2",
          "cpestana3",
      ];
    } else {
       cpestana = [
          "cpestana1",
          "cpestana2"
      ];
    }

    var Titulos = [
        "Usuarios",
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

            /*    var txt = document.getElementById("Text");
                var guia = document.getElementById("Guia");

               if(cont == 0){
                 txt.innerHTML = Titulos[cont];
               } else if(cont == 1) {
                 txt.innerHTML = Menu1;
               } else if(cont == 2) {
                 txt.innerHTML = Menu2;
               }
               */


                //guia.innerHTML = Titulos[cont];
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

function Recargar(numero) {
    var ubicacion_actual = location.origin;
    //console.log(ubicacion_actual + "SI-COMMITEE/comite/secretarias/secretaria.php");
    location.replace(ubicacion_actual + "/SI-COMMITEE/comite/secretarias/secretaria.php?pes=" + numero);


}

function Nombres(numero){
  var pestana2 = document.getElementById("Menu2");



  var Menu2 = pestana2.innerHTML;


  var txt = document.getElementById("Text");
  var guia = document.getElementById("Guia");

 if(numero == 1){
   txt.innerHTML = "Usuarios";
 } else if(numero == 2) {
   txt.innerHTML = Menu2;
 } else if(numero == 3) {
     var pestana3 = document.getElementById("Menu3");
   if(pestana3){
     var Menu3 = pestana3.innerHTML;
     txt.innerHTML = Menu3;
   }

 }

}
