<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../../Login/index.html");
}

$pr=$_SESSION['id'];
?>


<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Eliminar Documento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- -->



</head>
<style>
.white {
    color: white;
}
</style>

<body>
    <?php
       require("../../connect_db.php");
       $sql=("SELECT * FROM login where id='$pr'");
       $query=mysqli_query($mysqli,$sql);
       while($arreglo=mysqli_fetch_array($query)){
       utf8_decode($programa=$arreglo[11]);
       }
    ?>

    <div id="idCardBorrar" class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Eliminar Usuario</h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>
        <?php
		extract($_GET);
        require("../../connect_db.php");
        $sql="SELECT * FROM login WHERE id=$id";
        $ressql=mysqli_query($mysqli,$sql);
        while ($row=mysqli_fetch_row ($ressql)){
                $id=$row[0];
                $cedula=$row[1];
                $TipoUsuario=$row[2];
                $user=$row[3];
                $email=$row[4];
                //$pasadmin=$row[5];
                $pasdir=$row[9];
                //$pasjur=$row[7];
                //$pascor=$row[8];
                //$pass=$row[9];
                $telefono=$row[10];
                $programa=$row[11];
                $fechadenacimiento=$row[12];
                
                    }
        ?>
        <?php $fecha=date("Y-m-d");?>
        <div class="card-body">
            <div class="alert alert-warning">
                Está seguro que quiere <strong>borrar</strong> el usuario con la siguiente informacion ?
            </div>
            <form id="idFormBorrarEval" autocomplete="off">
                <!-- action=" echo htmlspecialchars($_SERVER['PHP_SELF']) "
                method="post" -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Id.</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $id?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Cedula: </label>
                            <input type="text" class="form-control" name="cedula" value="<?php echo $cedula?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nombre: </label>
                            <input type="text" class="form-control" name="user" value="<?php echo $user?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Usuario: </label>
                            <input type="text" class="form-control" name="email" value="<?php echo $email?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Password: </label>
                            <input type="text" class="form-control" name="pasdir" value="<?php echo $pasdir?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tipo de Usuario: </label>
                            <input type="text" class="form-control" name="TipoUsuario" value="<?php echo $TipoUsuario?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Telefono: </label>
                            <input type="text" class="form-control" name="telefono" value="<?php echo $telefono?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Programa: </label>
                            <input type="text" class="form-control" name="programa" value="<?php echo $programa?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Fecha de Nacimiento: </label>
                            <input type="date" class="form-control" name="fechadenacimiento"
                                value="<?php echo $fechadenacimiento?>" readonly="readonly">
                        </div>
                    </div>
                </div>


                <div class="card-footer mt-3">
                    <button type="button" class="btn btn-danger float-right" onclick="history.back();">Volver</button>
                    <button id="idActualEval" type="submit" class="btn btn-primary float-right mr-2">Borrar</button>

                    <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </form>
        </div>


    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    onSendHeight();
    onSubmitActualizar();
    localStorage.setItem("Mensaje2", null);
});

function onSendHeight(event) {
    var card = document.getElementById("idCardBorrar");
    //console.log(card.clientHeight);
    localStorage.setItem("evaluar", card.clientHeight);
}

var onSubmitActualizar = function() {
    $("#idFormBorrarEval").on("submit", function(e) {
        e.preventDefault();
        $('#idActualEval').attr("disabled", true);

        document.getElementById("idSpinner").style.display = "block";
        //alert('evento submit');

        // ejec_act_tesis_coor

        var other_data = $("#idFormBorrarEval").serializeArray();
        var paqueteDeDatos = new FormData();

        $.each(other_data, function(key, input) {
            paqueteDeDatos.append(input.name, input.value);
        });

        //console.log(other_data);

        $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: "15.1.1-ejecu_elim_user_coor.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            // console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "Eliminar Usuario");
                localStorage.setItem("Mensaje2-Message", "El Usuario fue eliminado con éxito!");
            } else {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Eliminar Usuario");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, el Usuario no fue eliminado");
            }
            document.getElementById("idSpinner").style.display = "none";
        });


    });
}
</script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>




</html>