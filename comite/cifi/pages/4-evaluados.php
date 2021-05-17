<div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1" style="background-color:#B42A2A; color: white;">
                                    <ul class="nav nav-tabs" id="custom-tabs-evaluados-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-proyectos-tab" data-toggle="pill"
                                                href="#custom-tabs-proyectos" role="tab"
                                                aria-controls="custom-tabs-one-1" aria-selected="true">Proyectos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-anteproyectos-tab" data-toggle="pill"
                                                href="#custom-tabs-anteproyectos" role="tab"
                                                aria-controls="custom-tabs-one-2"
                                                aria-selected="false">Anteproyectos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-otros-tab" data-toggle="pill"
                                                href="#custom-tabs-otros" role="tab" aria-controls="custom-tabs-one-2"
                                                aria-selected="false">Otros</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <?php
                                      $totalpeval = 0;
                                      require("../connect_db.php");
                                      $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and Aprob_Dir='SI' and (ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto') ORDER BY  id_tesis DESC ");
                                      //$sql = ("SELECT * FROM tesis where Aprob_Dir='SI' and (ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto') ORDER BY  id_tesis DESC ");
                                      $query = mysqli_query($mysqli, $sql);
                                      ?>
                                    <div class="tab-content" id="custom-tabs-evaluados-tabContent">

                                        <!-- Tab proyectos -->
                                        <div class="tab-pane fade active show" id="custom-tabs-proyectos"
                                            role="tabpanel" aria-labelledby="custom-tabs-proyectos-tab">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>

                                                            <tr>
                                                                <th style="width: 40%">Titulo</th>
                                                                <th class="text-center">Aprob_Dir</th>
                                                                <th class="text-center">Documento</th>
                                                                <th class="text-center">Fecha_Entrega</th>
                                                                <th class="text-center">Archivo</th>
                                                                <th class="text-center">Modificar</th>
                                                                <th class="text-center">Eval</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                while ($arreglo = mysqli_fetch_array($query)) {
                                                    $id = $arreglo[1];
                                                    $titu = $arreglo[3];
                                                    if ($arreglo[6] == "Entrega Propuesta" or $arreglo[6] == "Correccion Propuesta") {
                                                        $alma = "./propuestas";
                                                    } else if ($arreglo[6] == "Entrega Anteproyecto" or $arreglo[6] == "Correccion Anteproyecto") {
                                                        $alma = "./anteproyectos";
                                                    } else if ($arreglo[6] == "Entrega Proyecto" or $arreglo[6] == "Correccion Proyecto") {
                                                        $alma = "./proyectos";
                                                    } else {
                                                        $alma = "./otros";
                                                    }
                                                    $ide = $arreglo[0];
                                                    $totalpeval++;
                                                ?>
                                                            <tr>
                                                                <?php
                                                    require("../connect_db.php");
                                                        $sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'"); 
                                                        //$sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide'");
                                                        $result_Evalproyect = mysqli_query($mysqli, $sql_eval);
                                                        $state = 0;
                                                        $proyectos_exist = false;
                                                        while ($row = mysqli_fetch_row($result_Evalproyect)) {
                                                            $id_Eval = $row[0];
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                            $state = 1;
                                                        }
                                                        if($state == 1) {
                                                        ?>
                                                                <td><?php echo "$arreglo[3] "; ?></td>

                                                                <td class="text-center"><?php echo "$arreglo[4]"; ?>
                                                                </td>

                                                                <td class="text-center"><?php echo "$arreglo[6]"; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo str_replace("-","/",$arreglo[9]); ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td class="text-center"><?php 
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
                                                        <a class='btn btn-info btn-sm' href='pages/4.1-act_evaluacionpro.php?id=$id_Eval&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                        <i class='fas fa-pencil-alt'></i>
                                                        Editar
                                                        </a>
                                                        ";
                                                            ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php 
                                                        echo "
                                                        <a class='btn btn-danger btn-sm' target='_blank' href='../archivos/pdf/verevalposter.php?id=$arreglo[0]'>
                                                        <i class='fas fa-file-pdf'></i>
                                                        </a>
                                                        ";
                                                        ?>
                                                                </td>
                                                                <?php
                                                        } else {
                                                            $state = 0;
                                                            $totalpeval = $totalpeval - 1;
                                                            $proyectos_exist = true;
                                                        }
                                                    ?>
                                                            </tr>
                                                            <?php
                                                }
                                                if($proyectos_exist) {
                                                    echo '<div class="alert alert-info">
                                                    <strong>¡Atención!</strong> usted tiene
                                                    <strong>proyectos</strong> por aprobar y
                                                    <strong>documentos</strong> por
                                                    evaluar...
                                                </div>';
                                                }
                                                ?>
                                                        </tbody>
                                                    </table>

                                                    <?php
                                           echo "<center><font color='red' size='3'>Total registros: $totalpeval</font><br></center>";
                                           ?>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <!-- End Tab proyectos -->


                                        <!-- Tab anteproyectos -->
                                        <div class="tab-pane fade" id="custom-tabs-anteproyectos" role="tabpanel"
                                            aria-labelledby="custom-tabs-anteproyectos">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>

                                                            <tr>
                                                                <th style="width: 40%">Titulo</th>
                                                                <th class="text-center">Aprob_Dir</th>
                                                                <th class="text-center">Documento</th>
                                                                <th class="text-center">Fecha_Entrega</th>
                                                                <th class="text-center">Archivo</th>
                                                                <th class="text-center">Modificar</th>
                                                                <th class="text-center">Eval</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require("../connect_db.php");
                                                            $anteproyectos_exist = false;
                                                            $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and Aprob_Dir='SI' and (ID_estado='Entrega Anteproyecto' or ID_estado='Correccion Anteproyecto') ORDER BY  id_tesis DESC ");
                                                            $query = mysqli_query($mysqli, $sql);
                                                            $totalanteval = 0; 
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
                                                                $totalanteval++;
                                                            ?>
                                                            <tr>
                                                                <?php
                                                        require("../connect_db.php");
                                                        $sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        $result_Evalanteproyecto = mysqli_query($mysqli, $sql_eval);
                                                        $state = 0;
                                                        while ($row = mysqli_fetch_row($result_Evalanteproyecto)) {
                                                            $id_Eval = $row[0];
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                            $state = 1;
                                                        }
                                                        if($state == 1) {
                                                        ?>
                                                                <td><?php echo "$arreglo[3] "; ?></td>

                                                                <td class="text-center"><?php echo "$arreglo[4]"; ?>
                                                                </td>

                                                                <td class="text-center"><?php echo "$arreglo[6]"; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo str_replace("-","/",$arreglo[11]); ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td><?php 
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
                                                        <a class='btn btn-info btn-sm' href='pages/4.3-act_evaluacion.php?id=$id_Eval&jurado=$dir&ID_tesis=$arreglo[0]'>
                                                        <i class='fas fa-pencil-alt'></i>
                                                        Editar
                                                        </a>
                                                        ";
                                                            ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php 
                                                        echo "
                                                        <a class='btn btn-danger btn-sm' target='_blank' href='../archivos/pdf/verevalposter.php?id=$arreglo[0]'>
                                                        <i class='fas fa-file-pdf'></i>
                                                        </a>
                                                        ";
                                                        ?>
                                                                </td>

                                                                <?php
                                                        } else {
                                                            $totalanteval = $totalanteval - 1;
                                                            $anteproyectos_exist = true;
                                                        }
                                                    ?>
                                                            </tr>
                                                            <?php
                                                }
                                                if($anteproyectos_exist) {
                                                    echo '<div class="alert alert-info">
                                                    <strong>¡Atención!</strong> usted tiene
                                                    <strong>anteproyectos</strong> por aprobar y
                                                    <strong>documentos</strong> por
                                                    evaluar...
                                                </div>';
                                                }
                                                ?>
                                                        </tbody>
                                                    </table>

                                                    <?php
                                                echo "<center><font color='red' size='3'>Total registros: $totalanteval</font><br></center>";
                                                 ?>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Tab anteproyectos -->

                                        <!-- Tab otros -->
                                        <div class="tab-pane fade" id="custom-tabs-otros" role="tabpanel"
                                            aria.labelledby="custom-tabs-otros">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 40%">Titulo</th>
                                                                <th class="text-center">Aprob_Dir</th>
                                                                <th class="text-center">Documento</th>
                                                                <th class="text-center">Fecha_Entrega</th>
                                                                <th class="text-center">Archivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require("../connect_db.php");
                                                            $otros_exist = false;
                                                            $sql = ("SELECT * FROM tesis where (jurado1='$jur' or jurado2='$jur') and Aprob_Dir='SI' and (ID_estado!='Entrega Anteproyecto' and ID_estado!='Correccion Anteproyecto') and (ID_estado!='Entrega Proyecto' and ID_estado!='Correccion Proyecto') ORDER BY id_tesis DESC");
                                                            $query = mysqli_query($mysqli, $sql);
                                                            $totalotroseval = 0; 
                                                            while ($arreglo = mysqli_fetch_array($query)) {
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
                                                                $ide = $arreglo[0];
                                                                $totalotroseval++;
                                                            ?>
                                                            <tr>
                                                                <?php
                                                        require("../connect_db.php");
                                                        $sql_eval = ("SELECT * FROM evaluacion where Id_tesis='$ide' and jurado='$jur'");
                                                        $result_Evalotrosproyecto = mysqli_query($mysqli, $sql_eval);
                                                        $state = 0; 
                                                        while ($row = mysqli_fetch_row($result_Evalotrosproyecto)) {
                                                            $id_Eval = $row[0];
                                                            $asd = $row[1];
                                                            $jurado = utf8_decode($row[15]);
                                                            $fecha_eval = $row[16];

                                                            $state = 1;
                                                        }
                                                        if($state == 1) {
                                                        ?>
                                                                <td><?php echo "$arreglo[3] "; ?></td>

                                                                <td class="text-center"><?php echo "$arreglo[4]"; ?>
                                                                </td>

                                                                <td class="text-center"><?php echo "$arreglo[6]"; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo str_replace("-","/",$arreglo[9]); ?>
                                                                </td>
                                                                <?php //echo "$arreglo[12]"; ?>
                                                                <td class="text-center"><?php 
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

                                                                <?php
                                                        } else {
                                                            $totalotroseval = $totalotroseval - 1;
                                                            $otros_exist = true;
                                                        }
                                                    ?>
                                                            </tr>
                                                            <?php
                                                }
                                                if($otros_exist) {
                                                    echo '<div class="alert alert-info">
                                                    <strong>¡Atención!</strong> usted tiene actividades de
                                                    <strong>otros</strong> por aprobar y
                                                    <strong>documentos</strong> por
                                                    evaluar...
                                                </div>';
                                                }
                                                ?>
                                                        </tbody>
                                                    </table>

                                                    <?php
                                                echo "<center><font color='red' size='3'>Total registros: $totalotroseval</font><br></center>";
                                                 ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab otros -->



                                    </div>
                                </div>
                                <!-- end Tabs -->
                            </div>