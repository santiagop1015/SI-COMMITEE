$(document).ready(function () {
    $("#idButtonEnviarComen").on("click", function (e) {
        e.preventDefault();
      //  alert("123");

      var pharafComen = document.getElementById("idMessageComen");
    var BoxComen = document.getElementById("idBoxComen");
    var iconBoxComen = document.getElementById("idIConBoxComen");
    var paqueteDeDatos = new FormData();
    var other_data = $("#idFormComen").serializeArray();

    $.each(other_data, function (key, input) {
        paqueteDeDatos.append(input.name, input.value);
      });

      if (other_data[3].value.length <= 0) {
        //   alert("Comentario vacio");
        pharafComen.innerHTML = "Ingrese un comentario";
        BoxComen.style.display = "Block";
        BoxComen.className = "alert alert-danger alert-dismissible mt-6";
        iconBoxComen.className = "icon fas fa-ban";
      } else {
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: "pages/enviarmsgcoor.php",
          data: paqueteDeDatos,
        }).done(function (info) {
          //  console.log(info);
  
          if (info == 1) {
            pharafComen.innerHTML = "Comentario Registrado Correctamente";
            BoxComen.style.display = "Block";
            BoxComen.className = "alert alert-success alert-dismissible";
            iconBoxComen.className = "icon fas fa-check";
            document.getElementById("idTextAreaComen").value = "";
          } else {
            pharaf.innerHTML = info;
            cardMessages.style.display = "Block";
            cardMessages.className = "alert alert-danger alert-dismissible";
            iconBox.className = "icon fas fa-ban";
          }
        });
      }

    });
});