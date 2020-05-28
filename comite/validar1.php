<?php
session_start();
require("connect_db.php");

//date_default_timezone_set ('America/Bogota');
$username = $_POST['mail'];
$pass = $_POST['pass'];
$fecha = date('Y-m-d');
$sql2 = mysqli_query($mysqli, "SELECT * FROM login WHERE email='$username' ");

echo  $username;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parason Software - Contact</title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="../vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../vendors/linericon/style.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="../css/styleD.css">

    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <section class="hero-banner hero-banner--sm mb-30px">
        <div class="container">
            <div class="hero-banner--sm__content">
                <?
                die();
                if ($f2 = mysqli_fetch_assoc($sql2)) {

                    echo $f2;
                    die();

                    if ($pass == "") {

                        echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';

                        echo '<h1>Contraseña Incorrecta</h1>';

                        // echo "<script>location.href='Login/index.html'</script>";
                    }
                    if ($pass == $f2['pasadmin']) {
                        $_SESSION['id'] = $f2['id'];
                        $_SESSION['user'] = $f2['user'];

                        // include("../Delay.php");
                        echo '<h1>Bienvenido Administrador</h1>';
                        echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
                        //echo "<script>window.open('administrador/administrador.php', '_top')</script>";
                        //echo "<script>location.href='administrador/administrador.php'</script>";
                    }
                    if ($pass == $f2['pasdir']) {
                        $_SESSION['id'] = $f2['id'];
                        $_SESSION['user'] = $f2['user'];
                        $id_user = $_SESSION['id'];
                        $total = 1;
                        $sql3 = mysqli_query($mysqli, "SELECT * FROM entradas WHERE id_user='$id_user' ");
                        while ($row = mysqli_fetch_row($sql3)) {
                            $total = $row[3] + 1;
                            $id = $row[0];
                        }
                        if ($total == 1) {
                            mysqli_query($mysqli, "INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                        }
                        if ($total > 1) {
                            $sentencia = "update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                            $resent = mysqli_query($mysqli, $sentencia);
                        }
                        echo '<script>alert("BIENVENIDO PROFESOR")</script> ';
                        echo '<h1>Bienvenido Profesor</h1>';

                        //echo "<script>location.href='directores/director.php'</script>";
                    }
                    if ($pass == $f2['pasjur']) {
                        $_SESSION['id'] = $f2['id'];
                        $_SESSION['user'] = $f2['user'];
                        $id_user = $_SESSION['id'];
                        $TipoUsuario = $_SESSION['TipoUsuario'];
                        $total = 1;
                        $sql3 = mysqli_query($mysqli, "SELECT * FROM entradas WHERE id_user='$id_user' ");
                        while ($row = mysqli_fetch_row($sql3)) {
                            $total = $row[3] + 1;
                            $id = $row[0];
                        }
                        if ($total == 1) {
                            mysqli_query($mysqli, "INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                        }
                        if ($total >= 1) {
                            $sentencia = "update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                            $resent = mysqli_query($mysqli, $sentencia);
                        }
                        echo '<script>alert("BIENVENIDO Asistente/Secretari@")</script> ';
                        echo '<h1>Bienvenido Asistente/Secretario</h1>';

                        //echo "<script>location.href='jurado.php'</script>";
                    }
                    if ($pass == $f2['area']) {
                        $_SESSION['id'] = $f2['id'];
                        $_SESSION['user'] = $f2['user'];
                        $id_user = $_SESSION['id'];
                        $total = 1;
                        $sql3 = mysqli_query($mysqli, "SELECT * FROM entradas WHERE id_user='$id_user' ");
                        while ($row = mysqli_fetch_row($sql3)) {
                            $total = $row[3] + 1;
                            $id = $row[0];
                        }
                        if ($total == 1) {
                            mysqli_query($mysqli, "INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                        }
                        if ($total > 1) {

                            $sentencia = "update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                            $resent = mysqli_query($mysqli, $sentencia);
                        }
                        echo '<script>alert("BIENVENIDO Director de Investigación")</script> ';
                        echo '<h1>Bienvenido Director de Investigación</h1>';

                        //echo "<script>location.href='dinvestigar.php'</script>";
                    }
                    if ($pass == $f2['pascor']) {
                        $_SESSION['id'] = $f2['id'];
                        $_SESSION['user'] = $f2['user'];
                        $id_user = $_SESSION['id'];
                        $total = 1;
                        $sql3 = mysqli_query($mysqli, "SELECT * FROM entradas WHERE id_user='$id_user' ");
                        while ($row = mysqli_fetch_row($sql3)) {
                            $total = $row[3] + 1;
                            $id = $row[0];
                        }
                        if ($total == 1) {
                            mysqli_query($mysqli, "INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                        }
                        if ($total > 1) {

                            $sentencia = "update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                            $resent = mysqli_query($mysqli, $sentencia);
                        }
                        echo '<script>alert("BIENVENIDO Coordinador")</script> ';
                        echo '<h1>Bienvenido Coordinador</h1>';

                        //echo "<script>location.href='coordinador.php'</script>";
                    }
                    if ($pass == $f2['password']) {
                        $_SESSION['id'] = $f2['id'];
                        $_SESSION['user'] = $f2['user'];
                        $id_user = $_SESSION['id'];
                        $total = 1;
                        $sql3 = mysqli_query($mysqli, "SELECT * FROM entradas WHERE id_user='$id_user' ");
                        while ($row = mysqli_fetch_row($sql3)) {
                            $total = $row[3] + 1;
                            $id = $row[0];
                        }
                        if ($total == 1) {
                            mysqli_query($mysqli, "INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                        }
                        if ($total > 1) {
                            $sentencia = "update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                            $resent = mysqli_query($mysqli, $sentencia);
                        }
                        echo '<script>alert("BIENVENIDO ESTUDIANTE")</script> ';
                        echo '<h1>Bienvenido Estudiante</h1>';

                        //echo "<script>location.href='estudiantes/estudiante.php'</script>";
                    } else {
                        echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
                        echo '<h1>Contraseña Incorrecta</h1>';

                        //echo "<script>location.href='Login/index.html'</script>";
                    }
                } else {
                    echo '<script>alert("ESTE USUARIO NO EXISTE, POR FAVOR COMUNIQUESE CON EL COORDINADOR PARA PODER INGRESAR")</script> ';
                    echo '<h1>Este Usuario No Existe</h1>';

                    //echo "<script>location.href='Login/index.html'</script>";
                }

                ?>

            </div>

            <div class="pre-loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>

            </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->


    <!-- ================ contact section start ================= -->

    <!-- ================ contact section end ================= -->






    <!-- ================ start footer Area ================= -->

    <!-- ================ End footer Area ================= -->

    <script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>