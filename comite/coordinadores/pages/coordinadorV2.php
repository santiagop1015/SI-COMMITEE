<!DOCTYPE html>

<?php


//session_destroy();
// session_start();
	@$buscart=$_POST['buscart'];
    @$buscar=$_POST['buscar'];
    
$test = 1;
$OpcionSeleccionada = 1;

$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
 $coordir=$arreglo[4];
 $passd=$arreglo[8];

 if ($arreglo[2]!='Coordinador') {
	require("desconectar.php");
	header("Location:index.html");
}
}

// include 'test.php';  


    

?>




<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

<script>

    //Funcion para seleccionar opcion de menu
    function SeleccionarMenu(valor)
    {
        
        var opcion = valor;
        var i;

        for( i = 1; i <= 13; i++)
        {
            if(i == opcion )
            {
                elemento = document.getElementById("Opcion" + i);
                elemento.style.display='none';
                elemento.style.display='block';
            }  
            else
            {
                elemento = document.getElementById("Opcion" + i);
                elemento.style.display='none';
            }   

            }
                       
    }

   $(document).ready(function()
   {
        $('.ActualizarTesis').on('click',function()
        {
          var id =  $(this).attr('data-id');
           console.log(id);
           $.ajax({
            url: 'act_tesis_coor.php?id='+id,
            success: function(respuesta) {
              $('#ActualizarTesis').append(respuesta);
            },
            error: function() {
                  console.log("No se ha podido obtener la información");
              }
          });

        })
   }) 
   
   </script>


<div class="wrapper">


    </div>
  </aside>

  <div class="content-wrapper">

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- GENERAR ACTA ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
    <div id="Opcion1" style="display: block" class="content" >

        <form action="pdf/generalminutes.php" method="post">
            <div class="card card-danger">
              <div class="card-header" style="background:#C0392B;">
                <h3 class="card-title"> Generar actas de Comite</h3>
              </div>
              <div class="card-body">
                <div class="row">
                   
                    <div class="col-12 pt-2 pb-2">
                        <label>Espacio para la generación - Acta del Comité, por favor seleccione las fechas inicial y final correspondientes para su Acta.</label>
                    </div>

                    <div class="col-3">
                        <label>Fecha Actual</label>
                        <input disabled type="date" class="form-control"  name="fecha" class="fecha" value="<?php echo $fecha;?>">
                    </div>

                    <div class="col-3">
                        <label>Fecha Inicial</label>
                        <input required type="date"  class="form-control" name="fi" class="fi" placeholder=" AAAA-MM-DD">
                    </div>

                    <div class="col-3">
                        <label>Fecha Final</label>
                        <input required type="date"  class="form-control" name="fi" class="fi" placeholder=" AAAA-MM-DD">
                    </div>

                    <div class="col-12 pt-2 pb-2">
                        <label>Programa  <?php echo $programa;?> - <?php echo $pr;?></label>
                    </div>

                    <div class="col-12">
                        <label>Disposiciones</label>
                        <textarea required name="disposiciones" class="form-control"  placeholder="Escriba las disposiciones del comité para esta acta..."></textarea>
                    </div>

                    <div class="col-12 pt-2 pb-2">
                        <input type="submit" value="Generar Acta" class="btn btn-danger">
                    </div>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </form>

        

    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN GENERAR ACTA ------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
  
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- EVALUAR ---------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
    <div id="Opcion2" style="display: none"  class="content" >


        <div class="card card-danger" >
              <div class="card-header" style="background:#C0392B;">
                <h3 class="card-title"> Documentos para evaluar</h3>
              </div>
              <div class="card-body">
                <div class="row">
                   
                <?php
        $total=0;
                  $sql=("SELECT * FROM tesis  limit 10"); //ToDo: delete query

				// $sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and (terminado=0 or terminado=6) and observaciones='Por definir' and (aprob_dir='SI' or ID_directores='No aplica' or ID_directores='Por definir') and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Poster' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Poster' or ID_estado='Solicitud opción de grado' or ID_estado='Certificado terminacion Materias') ORDER BY  fecha_propuesta DESC");
                $query=mysqli_query($mysqli,$sql);
                
                ?> 
                    
                    <table class="table table-sm">
                        <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                            <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Director</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Archivo</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                            </tr>
                        </thead>

 

			
            <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
							$alma="./otros";	
						}	
                        echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
                        echo "<td>$arreglo[5]</td>";
                        
                        //Validacion para color del estado
                        if($arreglo[6]=='Entrega Propuesta'){echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Anteproyecto'){echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Proyecto'){echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";}
                        else {echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";}
                        //Fin Validacion para color del estado

                       // echo "<td>$arreglo[7]</td>";
              echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a></td>"; 
                        echo "<td><button data-toggle='modal' data-target='#exampleModal' type='button' class='btn btn-primary ActualizarTesis' data-id='$arreglo[0]'>Editar</button></td>
                        // <a href='act_tesis_coor?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";

                        // echo "<td><a href='act_tesis_coor?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
                        // echo "<td><img src='images/actualizar.png' width='30'  height='30' class='img-rounded' data-toggle='modal' data-target='#exampleModal'></td>"; 
                        //    echo "<td><a href='javascript:AsignarId(13)'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></a></td>"; 
                        //  echo "<td onclick='accion(2);'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded' f></td>"; 


                        echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</tbody></table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
					
			?>

                </div>
              </div>
              <!-- /.card-body -->
            </div>

    

    </div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN EVALUAR ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->


<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- PROCESO ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion3" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title"> Documentos en Proceso</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total1=0;
                    $sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and terminado=1 and (ID_estado='Entrega Poster' or ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto'  or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Solicitud opción de grado' or ID_estado='Certificado de Notas')  ORDER BY  ID_tesis DESC");
                    $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Id Est</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        <th scope="col">Eval</th>
                        </tr>
                    </thead>
                <?php 
                    while($arreglo=mysqli_fetch_array($query)){
                            $titu=$arreglo[3];
                            if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                            $alma="./propuestas";
                        }else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
                        {
                            $alma="./anteproyectos";
                        }else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
                        {
                            $alma="./proyectos";
                        }else if($arreglo[6]=="Certificado de Notas")
                        {
                            $alma="./certinotas";
                        }else if($arreglo[6]=="Certificado terminacion Materias")
                        {
                            $alma="./certimat";
                        }else if($arreglo[6]=="Prorroga")
                        {
                            $alma="./prorrogas";
                        }else {
                                $alma="./otros";	
                            }	
                            
                            
                            echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
                            echo "<td>$arreglo[3]</font></td>";
                            echo "<td>$arreglo[1]</font></td>";

                            //Validacion para color del estado
                            if($arreglo[6]=='Entrega Propuesta'){echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";}
                            else if($arreglo[6]=='Entrega Anteproyecto'){echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";}
                            else if($arreglo[6]=='Entrega Proyecto'){echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";}
                            else {echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";}
                            //Fin Validacion para color del estado

                            echo "<td><a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a></td>";
                            echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
                            echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
                            if($arreglo[6]=='Entrega Proyecto'){
                                echo "<td><a href='./pdf/verevalproy.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='30'  height='30'  class='img-rounded'></a></td>";

                            } else if($arreglo[6]=='Entrega Poster'){
                                echo "<td><a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='30'  height='30'  class='img-rounded'></a></td>";

                            }
                            else if($arreglo[6]=='Entrega Anteproyecto'){
                                echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='30'  height='30'  class='img-rounded'></a></td>";

                            }
                            else{
                            echo "<td><img src='images/noaplica.png' width='30'  height='30'  class='img-rounded'></td>";
                            }
                            echo "</tr>";
                            $total1++;
                            }
                            echo "</table>";
                        
                            echo "<center><font color='red' size='3'>Total registros: $total1</font><br></center>";
                            
                ?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN PROCESO ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- APLAZADO ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion4" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title"> Documentos Aplazados</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total2=0;

                    //ToDo: Delete query
                    $sql=("SELECT * FROM tesis limit 10");
            
                    //$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and terminado=3  ORDER BY  ID_tesis DESC  ");
                    $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Disposiciones</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
							$alma="./otros";	
						}	
						echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
                        echo "<td>$arreglo[3]</td>";
                        
				    	//Validacion para color del estado
                        if($arreglo[6]=='Entrega Propuesta'){echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Anteproyecto'){echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Proyecto'){echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";}
                        else {echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";}
                        //Fin Validacion para color del estado
                        
				    	echo "<td>$arreglo[7]</td>";
				    	echo "<td> <a href='$alma/$arreglo[8]' target='_blank'>$arreglo[8]</a> </td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "</tr>";
						$total2++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total2</font><br></center>";
						extract($_GET);
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN APLAZADO ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- RECHAZADO ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion5" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title"> Documentos Rechazados</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total2=0;

                    //ToDo: Delete query
                    $sql=("SELECT * FROM tesis limit 10");
            
                    //$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and terminado=4  ORDER BY  ID_tesis DESC  ");
                    $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Disposiciones</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
							$alma="./otros";	
						}	
						echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
                        
                        //Validacion para color del estado
                        if($arreglo[6]=='Entrega Propuesta'){echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Anteproyecto'){echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Proyecto'){echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";}
                        else {echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";}
                        //Fin Validacion para color del estado

				    	echo "<td>$arreglo[7]</td>";
				    	echo "<td> <a href='$alma/$arreglo[8]' target='_blank'>$arreglo[8]</a> </td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "</tr>";
						$total2++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total2</font><br></center>";
						extract($_GET);
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN RECHAZADO ---------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- PROXIMO A VENCER ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion6" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title"> Documentos Proximos a Vencer</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total3=0;

            
                    $sql=("SELECT * FROM tesis  where  programa='$programa' and (terminado!=0 and terminado != 6 and terminado !=2 and terminado !=7) and (fecha_aprob_propuesta between '$fecha' and '$nuevafecha' or fecha_ent_anteproyecto between '$fecha' and '$nuevafecha' or proyecto between '$fecha ' and '$nuevafecha')  ORDER BY  ID_tesis DESC  ");
                    $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Disposiciones</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Msg</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
							$alma="./otros";	
						}	
						echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
                        
                        //Validacion para color del estado
                        if($arreglo[6]=='Entrega Propuesta'){echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Anteproyecto'){echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Proyecto'){echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";}
                        else {echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";}
                        //Fin Validacion para color del estado

				    	echo "<td>$arreglo[7]</td>";
				    	echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "<td><a href='enviar_msg_vencer.php?ID_estudiante=$arreglo[1]&programa=$programa'><img src='images/msg.png' width='30'  height='30' class='img-rounded'</td>";
						echo "</tr>";
						$total3++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total3</font><br></center>";
						extract($_GET);
									?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN PROXIMO A VENCER ---------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- VB DIRECTOR ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion7" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title">Documentos Pendientes VB Director</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total4=0;

            
				    $sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and (terminado=6 or terminado=0) and observaciones='Por definir' and aprob_dir='' and ID_directores!='No aplica' and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
                    $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Director</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Propuesta</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
							$alma="./otros";	
						}	
						echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
				    	echo "<td>$arreglo[5]</td>";
						
				    	//Validacion para color del estado
                        if($arreglo[6]=='Entrega Propuesta'){echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Anteproyecto'){echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Proyecto'){echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";}
                        else {echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";}
                        //Fin Validacion para color del estado

				    	echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
				    	echo "<td>$arreglo[9]</td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "</tr>";
						$total4++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
						extract($_GET);
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN VB DIRECTOR ---------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- OTROS DOCUMENTOS ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion8" style="display: none"  class="content">


<!-------------------------------------------------------- ACTAS CARTAS SOLICITUDES OTROS ----------------------------------------------------------------->

<div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title">Cartas Solicitudes Otros</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total4=0;

            //ToDo: Delete Query
            $sql=("SELECT * FROM tesis limit 5");
            // $sql=("SELECT * FROM tesis  where (ID_estado='Prorroga' or ID_estado='Solicitud opción de grado' or ID_estado='Renuncia al Proyecto' or ID_estado='Certificado de Notas' or ID_estado='Cancelar Anteproyecto' or ID_estado='Cancelar Proyecto' or ID_estado='Certificado terminacion Materias' or ID_estado='Cancelar Propuesta' or ID_estado='Solicitud opción de grado') and programa='$programa' and terminado=0 ORDER BY  ID_tesis DESC");
            $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
					if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
						 $alma="./otros";	
					}
						echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
                        
                        //Validacion para color del estado
                        if($arreglo[6]=='Entrega Propuesta'){echo "<td><font color='#E74C3C'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Anteproyecto'){echo "<td><font color='#F1C40F'><b>$arreglo[6]</b></font></td>";}
                        else if($arreglo[6]=='Entrega Proyecto'){echo "<td><font color='#08B180'><b>$arreglo[6]</b></font></td>";}
                        else {echo "<td><font color='#black'><b>$arreglo[6]</b></font></td>";}
                        //Fin Validacion para color del estado

				    	echo "<td > <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
				    	echo "<td>$arreglo[9]</td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
						echo "</tr>";
						$total4++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
						extract($_GET);
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
<!-------------------------------------------------------- FIN CARTAS SOLICITUDES OTROS ----------------------------------------------------------------->

</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN OTROS DOCUMENTOS ---------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->


<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- DOCUMENTOS SEMILLEROS  ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion9" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title">Documentos Semillero</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total=0;

            //ToDo: Delete query
            $sql=("SELECT * FROM tesis  limit 10");            
            // $sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=1  and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
            $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Director</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Disposiciones</th>
                        <th scope="col">CIFI</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						$ID_tesis=$arreglo[0];

						/*$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
				$query=mysqli_query($mysqli,$sql);
				while($arreglo1=mysqli_fetch_array($query)){
				 $certi_CIFI=$arreglo1[5];
				 
				}*/
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else {
							$alma="./otros";	
						}	
                        
                        echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
                        echo "<td>$arreglo[3]</td>";
				    	echo "<td>$arreglo[5]</td>";
				    	echo "<td>$arreglo[6]</td>";

                        //Validacion Color estado
						if($arreglo[7]!='Por definir'){echo "<td><font color='green'>$arreglo[7]</font></td>";}
                        else{echo "<td>$arreglo[7]</td>";}
                        //Fin Validacion Color estado

                        echo "<td></td>";
				    	echo "<td > <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";


						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN DOCUMENTOS SEMILLEROS ----------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- POSTGRADOS  ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion10" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title">Documentos Postgrados</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total4=0;

            $sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=4  ORDER BY  ID_tesis DESC");
            $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
					if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
						 $alma="./otros";	
					}

                    echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
				    	//Validacion Color estado
						if($arreglo[7]!='Por definir'){echo "<td><font color='green'>$arreglo[6]</font></td>";}
                        else{echo "<td>$arreglo[6]</td>";}
                        //Fin Validacion Color estado
				    	echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
				    	echo "<td>$arreglo[9]</td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
                        echo "</tr>";
                        

						$total4++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
						extract($_GET);
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN POSTGRADOS --------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- AUX INVESTIGACION  ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion11" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title">Documentos Auxiliares de Investigación</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total=0;
            //ToDo: Delete query
            $sql=("SELECT * FROM tesis limit 10");
            // $sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=3 and (ID_estado='Entrega Monografia' or ID_estado='Entrega Propuesta' or ID_estado='Correccion Propuesta' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto' or ID_estado='Entrega Anteproyecto' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
            $query=mysqli_query($mysqli,$sql);
            $certi_CIFI = ""; //ToDo            
                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Disposiciones</th>
                        <th scope="col">CIFI</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						$ID_tesis=$arreglo[0];

					/*	$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
				$query=mysqli_query($mysqli,$sql);
				while($arreglo1=mysqli_fetch_array($query)){
				 $certi_CIFI=$arreglo1[5];
				 
				}*/
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else {
							$alma="./otros";	
						}	
						echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
				    	echo "<td>$arreglo[6]</td>";
                        echo "<td>$arreglo[7]</td>";
                        echo "<td>$certi_CIFI</td>";
				    	echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN AUX INVESTIGACION --------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- EN CURSO   ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion12" style="display: none"  class="content">


    <div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title">Documentos En curso (Diplomados)</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total=0;
            //ToDo: Delete query
            $sql=("SELECT * FROM tesis limit 10");
            //$sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=2 and (ID_estado='Entrega Monografia' or ID_estado='Correccion Monografia' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
            $query=mysqli_query($mysqli,$sql);
            $certi_CIFI = ""; //ToDo            
                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Disposiciones</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta"){
							$alma="./propuestas";
						}else if($arreglo[6]=="Entrega Anteproyecto")
						{
							$alma="./anteproyectos";
						}else if($arreglo[6]=="Entrega Proyecto")
						{
							$alma="./proyectos";
						}else {
							$alma="./otros";	
						}	
						echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td>$arreglo[3]</td>";
				    	echo "<td>$arreglo[6]</td>";
                        echo "<td>$arreglo[7]</td>";
				    	echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN EN CURSO --------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- ACTAS   ----------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
   
<div id="Opcion13" style="display: none"  class="content">


<div class="card card-danger" >
        <div class="card-header" style="background:#C0392B;">
            <h3 class="card-title">Actas Del Comité</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
            <?php
            $total4=0;

            
            $sql=("SELECT * FROM actas where programa='$programa' ORDER BY  numero DESC");
            $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-sm">
                    <thead class="thead-dark" style="font-size:10px; font-family:verdana">
                        <tr>
                        <th scope="col">Acta No.</th>
                        <th scope="col">Fecha Publicación</th>
                        <th scope="col">Ver Acta</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
				  	echo "<tbody style='font-size:10px; font-family:verdana'> <tr scope='row'>";
				    	echo "<td >$arreglo[1]</td>";
				    	echo "<td>$arreglo[4]</td>";
                        echo "<td><a href='pdf/$arreglo[6]'><img src='images/pdf.png' width='30'  height='30' class='img-rounded'></td>";
                        echo "<td><a href='elim_acta_coor.php?numero=$arreglo[1]&id=$arreglo[0]&programa=$programa'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
					echo "</tr>";
				}
				echo "</table>";
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN ACTAS --------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->


</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="ActualizarTesis">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
