<?php 
$jur = $_SESSION['user'];
$dir = $_SESSION['user'];
 ?>
<div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1" style="background-color:#B42A2A; color: white;">
                                    <ul class="nav nav-tabs" id="custom-tabs-evaluar-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-evaluarproyectos-tab"
                                                data-toggle="pill" href="#custom-tabs-evaluarproyectos" role="tab"
                                                aria-controls="custom-tabs-one-1" aria-selected="true">Proyectos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-evaluaranteproyectos-tab"
                                                data-toggle="pill" href="#custom-tabs-evaluaranteproyectos" role="tab"
                                                aria-controls="custom-tabs-one-2"
                                                aria-selected="false">Anteproyectos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-evluarmonografiasposter-tab"
                                                data-toggle="pill" href="#custom-tabs-evaluarmonografiasposter"
                                                role="tab" aria-controls="custom-tabs-one-2"
                                                aria-selected="false">Monografias/Poster</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-evaluar-tabContent">
                                        <div class="tab-pane fade active show" id="custom-tabs-evaluarproyectos"
                                            role="tabpanel" aria-labelledby="custom-tabs-evaluarproyectos-tab">
                                            <?php
                                $total_proyects = 0;
                                require("../connect_db.php");
                                $sql_proyects = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and (ID_estado='Entrega Proyecto') ORDER BY  id_tesis DESC");
                                //$sql_proyects = ("SELECT * FROM tesis where (ID_estado='Entrega Proyecto') ORDER BY  id_tesis DESC");  
                                $query = mysqli_query($mysqli, $sql_proyects);
                                ?>
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40%">Titulo</th>
                                                        <th class="text-center">Director</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Fecha_Aprob</th>
                                                        <th class="text-center">Archivo</th>
                                                        <th class="text-center">Evaluar</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                $proyectos_exist = false;
                                                while ($arreglo = mysqli_fetch_array($query)) {
                                                    if ($arreglo[6] == "Entrega Propuesta") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $ide = $arreglo[0];
                                                    $total_proyects++;
                                                ?>

                                                    <tr>
                                                        <?php
                                                        require("../connect_db.php");
                                                        
                                                            $sql_evalproyect = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                            $result_Evalproyect = mysqli_query($mysqli, $sql_evalproyect);
                                                            $state = 0;
                                                            
                                                            while ($row = mysqli_fetch_row($result_Evalproyect)) {
                                                                $state = 1;
                                                            }
                                                            
                                                            if($state != 1) {
                                                                $proyectos_exist = true;
                                                                ?>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[5] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[6] "; ?></td>
                                                        <td class="text-center">
                                                            <?php echo str_replace("-","/",$arreglo[10]); ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            if(strlen($arreglo[8]) > 1) {
                                                    
                                                                if(strlen($arreglo[8]) > 15) {
                                                                    echo "
                                                                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                    target='_blank'>
                                                                    ".substr($arreglo[8],0,15)."..."."
                                                                    </a>
                                                                    ";
                                                                } else {
                                                                    echo "
                                                                <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                target='_blank'>
                                                                $arreglo[8]
                                                                </a>
                                                                ";
                                                                }
                                                                } else {
                                                                echo "";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo "
                                                            <a class='btn btn-warning btn-sm' href='pages/3.1-evaluartesispro.php?id=$arreglo[0]&jurado=$jur'>
                                                            <i class='fas fa-spell-check'></i>
                                                            
                                                            </i>
                                                            </a>
                                                            ";	
                                                        ?>
                                                        </td>
                                                        <?php
                                                          } else {
                                                            $state = 0;
                                                            $total_proyects = $total_proyects - 1;
                                                            $proyectos_exist = false;
                                                          }
                                                    }
                                                    ?>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <?php

                                        echo "<center><font color='red' size='3'>Total registros: $total_proyects</font><br></center>"; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-evaluaranteproyectos" role="tabpanel"
                                            aria-labelledby="custom-tabs-evaluaranteproyectos-tab">
                                            <?php
                                               $total_anteproyects = 0;
                                               //echo $total2;
                                               require("../connect_db.php");
                                               $sql_anteproyects = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and terminado!=2 and (ID_estado='Entrega Anteproyecto') ORDER BY id_tesis DESC ");
                                               //$sql_anteproyects = ("SELECT * FROM tesis where (ID_estado='Entrega Anteproyecto') ORDER BY id_tesis DESC ");
                                               $query = mysqli_query($mysqli, $sql_anteproyects);
                                               ?>
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                <table class="table table-bordered table-striped">
                                                <thead>

                                                    <tr>
                                                        <th style="width: 40%">Titulo</th>
                                                        <th class="text-center">Director</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Fecha_Aprob</th>
                                                        <th class="text-center">Archivo</th>
                                                        <th class="text-center">Evaluar</th>
                                                        <!--    <th class="text-center">Modificar</th>
                                                        <th class="text-center">Eval</th> -->
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                $anteproyectos_exist = false; 
                                                while ($arreglo = mysqli_fetch_array($query)) {

                                                    if ($arreglo[6] == "Entrega Propuesta") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $ide = $arreglo[0];
                                                    $total_anteproyects++;
                                                ?>
                                                    <tr>

                                                        <?php
                                                    require("../connect_db.php");
                                                    $sql_Eval_anteproyect = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                    $result_Eval_Anteproyecto = mysqli_query($mysqli, $sql_Eval_anteproyect);
                                                    $state = 0;
                                                    while ($row = mysqli_fetch_row($result_Eval_Anteproyecto)) {
                                                        $id_Eval_anteproyecto = $row[0];
                                                        $asd = $row[1];
                                                        $jurado = utf8_decode($row[15]);
                                                        $fecha_eval = $row[16];

                                                        $state = 1;  
                                                        }

                                                        if($state != 1) {
                                                           $anteproyectos_exist = true;
                                                        ?>
                                                        <td><?php echo "$arreglo[3] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[5] "; ?></td>
                                                        <td class="text-center"><?php echo "$arreglo[6] "; ?></td>
                                                        <td class="text-center">
                                                            <?php echo str_replace("-","/",$arreglo[10]); ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                       if(strlen($arreglo[8]) > 1) {
                                                    
                                                        if(strlen($arreglo[8]) > 15) {
                                                            echo "
                                                            <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                            target='_blank'>
                                                            ".substr($arreglo[8],0,15)."..."."
                                                            </a>
                                                            ";
                                                        } else {
                                                            echo "
                                                        <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                        target='_blank'>
                                                        $arreglo[8]
                                                        </a>
                                                        ";
                                                        }
                                                        } else {
                                                        echo "";
                                                        }
                                                      ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                              echo "
                                                              <a class='btn btn-warning btn-sm' href='pages/3.3-evaluartesis.php?id=$arreglo[0]&jur=$dir'>
                                                              <i class='fas fa-spell-check'></i>
                                                              </i>
                                                              </a>
                                                              ";
                                                                ?>
                                                        </td>
                                                        <?php
                                                    } else {
                                                        $state = 0;
                                                        $total_anteproyects = $total_anteproyects - 1;
                                                        $anteproyectos_exist = false;
                                                    } 
                                                    
                                            }
                                                    ?>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <?php

                                        echo "<center><font color='red' size='3'>Total registros: $total_anteproyects</font><br></center>"; ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-evaluarmonografiasposter"
                                            role="tabpanel" aria-labelledby="custom-tabs-evaluarmonografiasposter-tab">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">

                                                    <?php

                                require("../connect_db.php");
                                $total = 0;
                                $totalm = 0;
                                $sql_monposters = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and (ID_estado='Entrega Monografia' or ID_estado='Entrega Poster' or ID_estado='Correccion Monografia') and terminado!=2 ORDER BY id_tesis DESC ");
                                 //$sql_monposters = ("SELECT * FROM tesis where (ID_estado='Entrega Monografia' or ID_estado='Entrega Poster' or ID_estado='Correccion Monografia') ORDER BY id_tesis DESC ");

                                $query = mysqli_query($mysqli, $sql_monposters);
                                //var_dump($sql);
                                ?>


                                                    <table class="table table-bordered table-striped">
                                                        <thead>

                                                            <tr>
                                                                <th style="width: 50%">Titulo</th>
                                                                <th class="text-center">Director</th>
                                                                <th class="text-center">Estado</th>
                                                                <th class="text-center">Fecha_Aprob</th>
                                                                <th class="text-center">Archivo</th>
                                                                <th class="text-center">Evaluar</th>
                                                                <th class="text-center">Modificar</th>
                                                                <th class="text-center">Evaluacion</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php

                                                while ($arreglo = mysqli_fetch_array($query)) {


                                                    if ($arreglo[6] == "Entrega Monografia") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $ide = $arreglo[0];
                                                    $totalm++;
                                                ?>
                                                            <tr>
                                                                <td><?php echo "$arreglo[3] "; ?></td>
                                                                <td class="text-center">
                                                                    <?php echo "$arreglo[5] "; ?></td>
                                                                <td class="text-center">
                                                                    <?php echo "$arreglo[6] "; ?></td>
                                                                <td class="text-center">
                                                                    <?php echo str_replace("-","/",$arreglo[10]); ?>
                                                                </td>
                                                                <td class="text-center">

                                                                    <?php 
                                                            
                                                            if(strlen($arreglo[8]) > 1) {
                                                    
                                                                if(strlen($arreglo[8]) > 15) {
                                                                    echo "
                                                                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                    target='_blank'>
                                                                    ".substr($arreglo[8],0,15)."..."."
                                                                    </a>
                                                                    ";
                                                                } else {
                                                                    echo "
                                                                <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                                                                target='_blank'>
                                                                $arreglo[8]
                                                                </a>
                                                                ";
                                                                }
                                                                } else {
                                                                echo "";
                                                                }
                                                            
                                                           // echo "<a href='$alma/$arreglo[8] ' target='_blank'>$arreglo[8]</a> "; ?>
                                                                </td>
                                                                <?php
                                                        require("../connect_db.php");
                                                        $sql_evalmonposters = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        //$sql_evalmonposters = ("SELECT * FROM evaluacion where Id_tesis='2'");
                                                        //var_dump($sql);
                                                        $ressql = mysqli_query($mysqli, $sql_evalmonposters);
                                                        while ($row = mysqli_fetch_row($ressql)) {
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                        ?>
                                                                <td class="text-center">EVALUADO</td>
                                                                <td class="text-center">
                                                                    <?php //echo "<a href='act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'><img src='images/actualizar.png'  width='30'  height='30' class='img-rounded';"
                                                                ?>
                                                                    <?php

                                                                echo "
                                                                <a class='btn btn-info btn-sm' href='pages/3.5-act_evaluacionposter.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                                <i class='fas fa-pencil-alt'>
                                                                
                                                                </i>
                                                                </a>
                                                                ";

                                                            /*    $direccion = '"pages/act_evaluacionposter.php?"';

                                                                $parametro = '"id=' . $row[0] . '&jurado=' . $dir . '&ID_tesis=' . $arreglo[0] . '"';
                                                                //$name = '"name"';
                                                                $img = '<img src="images/actualizar.png"  width="30"  height="30" class="img-rounded"></img>';

                                                                echo "<button onclick='CenterWindow($direccion, $parametro, 600, 600);'>$img</button>";
                                                                */
                                                                ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php 
                                                            echo "
                                                            <a class='btn btn-danger btn-sm' target='_blank' href='../archivos/pdf/verevalposter.php?id=$arreglo[0]'>
                                                            <i class='fas fa-file-pdf'></i>
                                                            Ver
                                                            </i>
                                                            </a>
                                                            ";

                                                            if ($asd !== $ide) {
                                                                echo "
                                                                <a class='btn btn-warning btn-sm' href='pages/evaluartesis.php?id=$row[0]&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                                <i class='fas fa-spell-check'></i>
                                                                Evaluar
                                                                </i>
                                                                </a>
                                                                ";
                                                            }

                                                        //    echo "<a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded';" 
                                                        ?>
                                                                </td>
                                                                <?php
                                                        }
                                                        ?>
                                                                <?php
                                                    }
                                                    ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php echo "<center><font color='red' size='3'>Total registros: $totalm</font><br></center>"; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>