<!DOCTYPE html>

<?php


//session_destroy();
session_start();
	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
 $coordir=$arreglo[4];
 $passd=$arreglo[8];

 if ($arreglo[2]!='Administrador') {
	require("../desconectar.php");
	header("Location:../Login/index.html");
}
}


?>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Generar Acta</title>
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

</head>

<body>

    <div id="idCard" class="card card-default" style="margin-bottom: 0px;">

        <div class="card-body">
            <div class="alert alert-info">
                Espacio para la generación - Acta del Comité, por favor seleccione las fechas inicial y final
                correspondientes para su Acta.
            </div>
            <form action="1.1-generarActaConf.php" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php $fecha=date("Y-m-d");?>
                            <label>Fecha Actual</label>
                            <input type="date" class="form-control" name="fecha" class="fecha"
                                value="<?php echo $fecha;?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Fecha Inicial</label>
                            <input type="date" class="form-control" name="fi" class="fi" placeholder=" AAAA-MM-DD"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Fecha Final:</label>
                            <input type="date" class="form-control" name="ff" class="ff" placeholder=" AAAA-MM-DD"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Programa</label>
                                    <input type="text" class="form-control" name="programa" class="programa"
                                        value="<?php echo $programa;?>" readonly="readonly">
                                </div>


                                <div class="col-sm-6">
                                    <label>Id</label>
                                    <input type="text" class="form-control" name="idc" class="idc"
                                        value="<?php echo $pr;?>" readonly="readonly">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Disposiciones</label>
                            <textarea class="form-control" rows="4" name="disposiciones" cols="29"
                                placeholder="Escriba las disposiciones del comité para esta acta..."
                                aria-required="true" required></textarea>

                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary float-right">Generar Acta</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);

$(document).ready(function() {
    Evaluar();
    /*  $("#idFormEvaluar").submit(function() {
          //  alert("Submitted");
          Evaluar();
      });
      */
    setTimeout(() => {
        Evaluar();
    }, 200);
});

function Evaluar(event) {
    var card = document.getElementById("idCard");
    // console.log(card.clientHeight);
    localStorage.setItem("evaluar", card.clientHeight);
}
</script>


</html>