
//$('#modalloading').modal('show');
document.body.style.backgroundColor = "Transparent";
// Dadas la division que contiene todas las pestañas y la de la pestaña que se
// quiere mostrar, la funcion oculta todas las pestañas a excepcion de esa.
function cambiarPestanna(pestannas, pestanna) {
  // Obtiene los elementos con los identificadores pasados.

  var cpestana1 = document.getElementById("cpestana1");
  var cpestana2 = document.getElementById("cpestana2");
  var cpestana3 = document.getElementById("cpestana3");
  var cpestana4 = document.getElementById("cpestana4");
  var cpestana = ["cpestana2", "cpestana3", "cpestana4", "cpestana5"];
  var cpestana5 = document.getElementById("cpestana5");
  var Titulos = [
    "Registrar Documentos",
    "Documentos Registrados",
    "Actas",
    "Aplazamiento Semestre",
  ];

  pestanna = document.getElementById(pestanna.id);
  listaPestannas = document.getElementById(pestannas.id);

  // Obtiene las divisiones que tienen el contenido de las pestañas.
  cpestanna = document.getElementById("c" + pestanna.id);

  var pestanaid = "c" + pestanna.id;
  // pestanaid = "cpestana" + localStorage.getItem("number" + 1);
  listacPestannas = document.getElementById("contenido" + pestannas.id);
  localStorage.setItem("number", 1);
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
      localStorage.setItem("number", cont);
      if ((petananone.style.display = "none")) {
        cpestanna.style.display = "block";

        var txt = document.getElementById("Text");
        //  var guia = document.getElementById("Guia");

        txt.innerHTML = Titulos[cont];
        // guia.innerHTML = Titulos[cont];

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
    $(pestanna).css("background", "#B42A2A");
    //  $(pestanna).css("padding-bottom", "2px");

    //
  });

  //  $(".loader").fadeOut("slow");
  document.getElementById("IdIconLoad").classList.add("d-none");
}

function myfunction() {
  var Local = localStorage.getItem("number");
  if (Local !== null) {
    //  Local = localStorage.getItem("number");
    Local = parseInt(Local);
    //Local = Local + 1;
    // Local = Local.toString();
    // Local = "pestana" + Local;
    switch (Local) {
      case 0:
        cambiarPestanna(pestanas, pestana2);
        break;
      case 1:
        cambiarPestanna(pestanas, pestana3);
        break;
      case 2:
        cambiarPestanna(pestanas, pestana4);
        break;
      case 3:
        cambiarPestanna(pestanas, pestana5);
        break;
    }
    // console.log(Local);
  } else {
    // Local = pestana2;
    cambiarPestanna(pestanas, pestana2);
  }
}

$(document).on("ready", function () {
  registerMessages();
  //idBoxAlert
});

var inputUplouad = document.getElementById("archivo");
var LabelInput = document.getElementById("idNameFileRegistrarDoc");

inputUplouad.onchange = function (e) {
  //alert("Onchanger");
  var file = $("#archivo").prop("files")[0];
  var fileName = file.name;
  // console.log(fileName);
  LabelInput.innerHTML = fileName;

  // console.log(e);
};

function fileValidation() {
  var fileInput = document.getElementById("archivo");
  var filePath = fileInput.value,
    exit;
  var allowedExtensions = /(.pdf)$/i;

  if (!allowedExtensions.exec(filePath)) {
    exit = 0;
  } else {
    exit = 1;

    //console.log(filePath);
  }
  returnn = exit;
  return returnn;
}
var Accept = false;
var registerMessages = function () {
  $("#idButtonRegistrarDoc").on("click", function (e) {
    e.preventDefault();
    var file = $("#archivo").prop("files")[0];
    //console.log(file);
    //idNameFileRegistrarDoc
    

    //file.name;
    var pharaf = document.getElementById("idMessageRegistrarDoc");
    var cardMessages = document.getElementById("idBoxAlert");
    var iconBox = document.getElementById("idIConBox");
    // cardMessages.style.display = 'None'
    //idCardBodyMessagesSubirDoc
    if (file === undefined) {
      //    console.log("Ingrese archivo");

      pharaf.innerHTML = "Suba un archivo primero";
      cardMessages.className = "alert alert-danger alert-dismissible";
      iconBox.className = "icon fas fa-ban";
      cardMessages.style.display = "Block";
      LabelInput.innerHTML = "Subir Archivo - Tamaño menor a 5Mb";

      //cardMessages.html("Suba un archivo primero");
    } else {
      var validationArchive = fileValidation();
      if (validationArchive === 1) {
        cardMessages.style.display = "None";

        var paqueteDeDatos = new FormData();

        var other_data = $("#idFormRegistrarDoc").serializeArray();
        //var other_data = $('form').serializeArray();
        $.each(other_data, function (key, input) {
          paqueteDeDatos.append(input.name, input.value);
        });

        paqueteDeDatos.append("archivo", file);
        //console.log(paqueteDeDatos);
        if(Accept){
          paqueteDeDatos.append("reemplazar", 1);
          //alert("aceptar funciona");
        }

        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: "pages/validacionp.php",
          data: paqueteDeDatos,
        }).done(function (info) {
          // $("#message").val("");
          // var altura = $("#conversation").prop("scrollHeight");
          // $("#conversation").scrollTop(altura);
          //console.log("paquetedatos",paqueteDeDatos);
          console.log(info);

          if (info == 1) {
            pharaf.innerHTML = "Documento Registrado Correctamente";
            cardMessages.style.display = "Block";
            cardMessages.className = "alert alert-success alert-dismissible";
            iconBox.className = "icon fas fa-check";

            //idButtonRegistrarDoc
            document.getElementById("idButtonRegistrarDoc").disabled = true;
            document.getElementById("archivo").disabled = true;
            document.getElementById("idMenuReplaceArchive").style.display = "none";

            setTimeout(function () {
              // location.reload();
              //clearForm();
            }, 3000);
            // $('#idFormRegistrarDoc')
          } else if(info == 2){
            pharaf.innerHTML = "Ya existe un documento con estas caracteristicas, desea reemplazarlo?";
            cardMessages.style.display = "Block";
            cardMessages.className = "alert alert-danger alert-dismissible";
            iconBox.className = "icon fas fa-ban";
            document.getElementById("idButtonRegistrarDoc").disabled = true;
            document.getElementById("archivo").disabled = true;
            document.getElementById("idMenuReplaceArchive").style.display = "block";
          } else if(info == 3){
            pharaf.innerHTML = "Documento Actualizado Correctamente";
            cardMessages.style.display = "Block";
            cardMessages.className = "alert alert-success alert-dismissible";
            iconBox.className = "icon fas fa-check";
            //idButtonRegistrarDoc
            document.getElementById("idButtonRegistrarDoc").disabled = true;
            document.getElementById("archivo").disabled = true;
            document.getElementById("idMenuReplaceArchive").style.display = "none";
          } else {
            pharaf.innerHTML = info;
            cardMessages.style.display = "Block";
            cardMessages.className = "alert alert-danger alert-dismissible";
            iconBox.className = "icon fas fa-ban";
            document.getElementById("idMenuReplaceArchive").style.display = "none";
          }
        });
      } else {
        pharaf.innerHTML = "Suba un archivo pdf";
        cardMessages.className = "alert alert-danger alert-dismissible";
        iconBox.className = "icon fas fa-ban";
        cardMessages.style.display = "Block";
        LabelInput.innerHTML = "Subir Archivo - Tamaño menor a 5Mb";
      }
      // End if validation archive
    }
    // end validation content archive
  });
};

function clearForm(formId) {
  //var elements = oForm.elements;
  var oForm;
  if (!formId) {
    oForm = document.getElementById("idFormRegistrarDoc");
  } else {
    oForm = document.getElementById(formId);
  }
  var elements = oForm.elements;
  oForm.reset();

  for (i = 0; i < elements.length; i++) {
    field_type = elements[i].type.toLowerCase();

    switch (field_type) {
      case "text":
      case "email":
      case "password":
      case "textarea":
      case "hidden":
        elements[i].value = "";
        break;

      case "radio":
      case "checkbox":
        if (elements[i].checked) {
          elements[i].checked = false;
        }
        break;

      case "select-one":
      case "select-multi":
        elements[i].selectedIndex = -1;
        break;

      default:
        break;
    }
  }
}
