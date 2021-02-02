// *************************************************************************************************************************************
// FUNCIONES APLAZAMIENTO **************************************************************************************************************
// *************************************************************************************************************************************

  
  ///Registar infomracion aplazamiento
  function fregistrarAplazamiento(form)
  {
    var mensajeStyle = "alert alert-danger alert-dismissible mt-6";
    var paqueteDeDatos = new FormData();
    var other_data = $(form).serializeArray();

    //Validacion Formulario
    if(!validacionFormAplazamiento())
    {
       mensaje = "Ingrese los campos obligatorios";

       generarMensaje(mensaje, 'danger');
    }
    else
    {
        $.each(other_data, function (key, input) {
          paqueteDeDatos.append(input.name, input.value);
        });
    
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: "pages/registraraplazamiento.php",
          data: paqueteDeDatos,
        }).done(function (info) {
          

          if(info.includes('EXITOSO'))//Mensaje Exitoso
          {
            generarMensaje(info, 'success');
          }
          else if(info.includes('ERROR'))//Mensaje Error
          {
            generarMensaje(info, 'danger');
          }
          

        });
    }

  }

  //Valida Formulario Aplazamiento
  function validacionFormAplazamiento()
  {
    var vDescripcion = document.getElementById("Descripcion").value;


    if(vDescripcion == null || vDescripcion == "")
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  //Genera Mensaje
  function generarMensaje(mensaje, style){


    //Consultar componentes mensaje
    var pharafComen = document.getElementById("idMessageAplazamientoBody");
    var BoxComen = document.getElementById("idMensajeAplazamiento");
    var styleDiv = "alert alert-success alert-dismissible";
    var iconBoxComen = document.getElementById("idIConBoxComenAplazamiento");

    var icon = "icon fas fa-check";

    if(style == 'success')
    {
      styleDiv = "alert alert-success alert-dismissible";
      icon = "icon fas fa-check";
    }
    else if(style == 'danger')
    {
      styleDiv = "alert alert-danger alert-dismissible";
      icon = "icon fas fa-ban";
    }

    //Asignar valores al mensaje
    pharafComen.innerHTML = mensaje;
    BoxComen.style.display = "Block";
    BoxComen.className = styleDiv;
    iconBoxComen.className = icon;

  }


// *************************************************************************************************************************************
// FUNCIONES VALIDACION FECHA DOCUMENTO ************************************************************************************************
// *************************************************************************************************************************************
function fValidarFechasDocumento(form)
{
  var mensajeStyle = "alert alert-danger alert-dismissible mt-6";
  var paqueteDeDatos = new FormData();
  var other_data = $(form).serializeArray();

  //Validacion Formulario
  if(document.getElementById("ID_estado").value == null || 
     document.getElementById("ID_estado").value == "")
  {
     mensaje = "Ingrese un tipo de documento valido";

     generarMensajeRegisrarDocumento(mensaje, 'danger');
  }
  else
  {
      $.each(other_data, function (key, input) {
        paqueteDeDatos.append(input.name, input.value);
      });
  
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: "pages/validarFechaDocumento.php",
        data: paqueteDeDatos,
      }).done(function (info) {
        

        if(info.includes('EXITOSO'))//Mensaje Exitoso
        {
          generarMensajeRegisrarDocumento(info, 'success');
          document.getElementById("idButtonRegistrarDoc").disabled = false;
          
        }
        else if(info.includes('ERROR'))//Mensaje Error
        {
          generarMensajeRegisrarDocumento(info, 'danger');
          document.getElementById("idButtonRegistrarDoc").disabled = true;
        }
        

      });
  }

}


//Genera Mensaje
function generarMensajeRegisrarDocumento(mensaje, style){


  //Consultar componentes mensaje
  var pharafComen = document.getElementById("idMessageRegistrarDoc");
  var BoxComen = document.getElementById("idBoxAlert");
  var styleDiv = "alert alert-success alert-dismissible";
  var iconBoxComen = document.getElementById("idIConBox");

  var icon = "icon fas fa-check";

  if(style == 'success')
  {
    styleDiv = "alert alert-success alert-dismissible";
    icon = "icon fas fa-check";
  }
  else if(style == 'danger')
  {
    styleDiv = "alert alert-danger alert-dismissible";
    icon = "icon fas fa-ban";
  }

  //Asignar valores al mensaje
  pharafComen.innerHTML = mensaje;
  BoxComen.style.display = "Block";
  BoxComen.className = styleDiv;
  iconBoxComen.className = icon;

}
