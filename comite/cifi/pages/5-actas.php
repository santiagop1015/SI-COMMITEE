<div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1" style="background-color:#B42A2A; color: white;">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <?php
        
        $año = date("Y");
       // $año = gettype($año);
        $año = (int)$año;
        // $año1 = $año - 1;
        // $año2 = $año1 - 1;
        // $año3 = $año2 - 1;
        // $año4 = $año3 - 1;

       // $val = $cont-5;

        
       for($cont = 0; $cont < 5; $cont++) {

            
              echo '<li class="nav-item">';
              if($cont == 0) {
                echo '<a class="nav-link active" id="custom-tabs-one-1-tab" data-toggle="pill"
                href="#custom-tabs-one-1" role="tab" aria-controls="custom-tabs-one-1"
                aria-selected="true">'. $año .'</a>'; 
              } else if($cont == 1) {
                echo '<a class="nav-link" id="custom-tabs-one-2-tab" data-toggle="pill"
                href="#custom-tabs-one-2" role="tab" aria-controls="custom-tabs-one-2"
                aria-selected="false">'. $año .'</a>';
              }else if($cont == 2) {
                echo '<a class="nav-link" id="custom-tabs-one-3-tab" data-toggle="pill"
                href="#custom-tabs-one-3" role="tab" aria-controls="custom-tabs-one-3"
                aria-selected="false">'. $año .'</a>';
              } else if($cont == 3) {
                echo '<a class="nav-link" id="custom-tabs-one-4-tab" data-toggle="pill"
                href="#custom-tabs-one-4" role="tab" aria-controls="custom-tabs-one-4"
                aria-selected="false">'. $año .'</a>';
              } else if($cont == 4) {
                echo '<a class="nav-link" id="custom-tabs-one-5-tab" data-toggle="pill"
                href="#custom-tabs-one-5" role="tab" aria-controls="custom-tabs-one-5"
                aria-selected="false">'. $año .'</a>';
              }

            $año = $año - 1;
    }
    ?>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <?php
            require('../connect_db.php');
            $año = date("Y");
       // $año = gettype($año);
            $año = (int)$año;
     for($cont = 0; $cont < 5; $cont++) {
         
        if($cont == 0) {
         echo '<div class="tab-pane fade active show" id="custom-tabs-one-1" role="tabpanel"
         aria-labelledby="custom-tabs-one-1-tab">';
        } else if($cont == 1) {
            echo '<div class="tab-pane fade" id="custom-tabs-one-2" role="tabpanel"
            aria-labelledby="custom-tabs-one-2-tab">';
        } else if($cont == 2) {
            echo '<div class="tab-pane fade" id="custom-tabs-one-3" role="tabpanel"
            aria-labelledby="custom-tabs-one-3-tab">';
        } else if($cont == 3) {
            echo '<div class="tab-pane fade" id="custom-tabs-one-4" role="tabpanel"
            aria-labelledby="custom-tabs-one-4-tab">';
        } else {
            echo '<div class="tab-pane fade" id="custom-tabs-one-5" role="tabpanel"
            aria-labelledby="custom-tabs-one-5-tab">';
        }
        
        $sql = ("SELECT * FROM actas where programa='$programa' AND YEAR(fecha_inicial) = $año ORDER BY numero DESC");
        $query = mysqli_query($mysqli, $sql);

        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="text-center">Acta No.</th>';
        echo '<th class="text-center">Fecha Publicacion</th>';
        echo '<th class="text-center">Ver Acta</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
                            while ($arreglo = mysqli_fetch_array($query)) {
                                echo "<tr>";
                                echo "<td class='text-center'>$arreglo[1]</td>";
                                echo "<td class='text-center'>$arreglo[4]</td>";
                                //echo "<td bgcolor='797D7F' align='center'><a href='./pdf/veracta.php?numero=$arreglo[1]&programaa=$programa&idc=$pr' target='_blanck'><img src='images/pdf.png' width='40'  height='30' class='img-rounded'></td>";
                                echo "<td class='text-center'><a href='../archivos/pdf/$arreglo[6]'><i class='nav-icon fa fa-file-pdf' style='color: red;'></i></td>";
                                //echo "<td><a href='./pdf/veracta.php?numero=$arreglo[1]' target='_blank'><img src='images/pdf.png' width='50'  height='50' class='img-rounded'></td>";
                                //echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='images/eliminar.png' width='38'  height='38' class='img-rounded'/></a></td>";

                                //echo "</tr>";

                                echo "</tr>";
                            }
                            
        echo '</tbody>';
        echo '</table>';
        echo '</div>'; 
            $año = $año - 1;
            }
            
            ?>
                                    </div>
                                </div>
                            </div>