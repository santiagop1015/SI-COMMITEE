<?php



//date_default_timezone_set ('America/Bogota');
extract($_GET);


//date_default_timezone_set ('America/Bogota');
?>


<!DOCTYPE html>
<html lang="es" style="background: #B42A2A">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SICOMMITEE - Actualizar Usuario</title>
    <link rel="icon" href="../../../img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="../../../vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../../vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../vendors/linericon/style.css">
    <link rel="stylesheet" href="../../../vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="../../../css/styleD.css">

    <link rel="stylesheet" href="../../../css/estilos.css">
</head>

<body>

    <!--================ Hero sm Banner start =================-->
    <section class="hero-banner hero-banner--sm mb-30px" style="background: #B42A2A">
        <div class="container">
            <div id="idDivisor" class="hero-banner--sm__content">

            </div>

            <div id="Points" class="pre-loader mt-5 mr-5">
              <!--  <span></span>
                <span></span>
                <span></span>
                <span></span> -->
            </div>
        </div>


    </section>

    <script src="../../../vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../../vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../../../vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../../../js/jquery.ajaxchimp.min.js"></script>
    <script src="../../../js/mail-script.js"></script>
    <script src="../../../js/main.js"></script>

    <script>
    var user = window.location.search.substring(1, 6);
    console.log(user);
    var div = document.getElementById("idDivisor");



    switch (user) {
        case "exito":
        <?php if (isset($msg)): ?>
          //div.innerHTML = "<h1>Datos Almacenados con Exito</h1><br><br><button type='button' class='btn btn-dark' style='height: 80px; width: 100px;' onclick='window.opener.location.reload(); window.close();'>Continuar</button>";
          div.innerHTML = "<h1><?php echo $msg ?></h1><br><br><button type='button' class='btn btn-dark' style='height: 80px; width: 100px;' onclick='window.opener.location.reload(); window.close();'>Continuar</button>";


            break;
        case "error":
            div.innerHTML = "<h1><?php echo $msg ?></h1><br><h1>No se almacenaron los datos!</h1><br><br><button type='button' class='btn btn-dark mr-2' style='height: 80px; width: 100px;' onclick='history.back(2);'>Volver</button><button type='button' class='btn btn-dark' style='height: 80px; width: 100px;' onclick='window.close();'>Salir</button>";

            break;
        <?php endif ?>
        default:
        div.innerHTML = "<h1>Error inesperado, contacte al Administrador</h1><br><h1>No se almacenaron los datos!</h1><br><br><button type='button' class='btn btn-dark mr-2' style='height: 80px; width: 100px;' onclick='history.back(2);'>Volver</button><button type='button' class='btn btn-dark' style='height: 80px; width: 100px;' onclick='window.close();'>Salir</button>";

    }

    //div.innerHTML = "<h1>Usuario Actualizado con Exito</h1>";
    //div.innerHTML =  "<h1>Usuario Actualizado con Exito</h1><br><br><button type='button' class='btn btn-dark' style='height: 80px; width: 100px;' onclick='window.close();'>Continuar</button>";
    </script>
</body>

</html>
