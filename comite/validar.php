<?php
session_start();
require("connect_db.php");

//date_default_timezone_set ('America/Bogota');
$username = $_POST['mail'];
$pass = $_POST['pass'];
$fecha = date('Y-m-d');
$sql2 = mysqli_query($mysqli, "SELECT * FROM login WHERE email='$username' ");
if ($f2 = mysqli_fetch_assoc($sql2)) {

    if ($pass == "") {

        echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
        //echo "<script>location.href='index.html'</script>";
        echo "<script>
        localStorage.setItem('StateMessageLogin', 1);
        localStorage.setItem('MessageLogin', 'Usuario o contraseña Incorrecta');
        localStorage.setItem('EmailLogin', '$username');
        location.href='../index.html';
        </script>";
        
    }
    if ($pass == $f2['pasadmin']) {
        $_SESSION['id'] = $f2['id'];
        $_SESSION['user'] = $f2['user'];
        //echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
        //echo "<script>window.open('administrador/administrador.php', '_top')</script>";
        //echo "<script>location.href='administrador/administrador.php'</script>";
        echo "<script>location.href='Delayed.php?admin'</script>";
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
        //echo '<script>alert("BIENVENIDO PROFESOR")</script> ';
        //echo "<script>location.href='directores/director.php'</script>";
        echo "<script>location.href='Delayed.php?director'</script>";
    }
    if ($pass == $f2['pasjur']) {
        $_SESSION['id'] = $f2['id'];
        $_SESSION['user'] = $f2['user'];
        $id_user = $_SESSION['id'];
        //$TipoUsuario = $_SESSION['TipoUsuario'];
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
        //echo '<script>alert("BIENVENIDO Asistente/Secretari@")</script> ';
        //echo "<script>location.href='jurado.php'</script>";
        echo "<script>location.href='Delayed.php?jurado'</script>";
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
        //echo '<script>alert("BIENVENIDO Director de Investigación")</script> ';
        //echo "<script>location.href='dinvestigar.php'</script>";
        echo "<script>location.href='Delayed.php?dinvestigar'</script>";
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
        //echo "<script>location.href='coordinador.php'</script>";
        echo "<script>location.href='Delayed.php?coordinador'</script>";
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
        //echo '<script>alert("BIENVENIDO ESTUDIANTE")</script> ';
        //echo "<script>location.href='estudiantes/estudiante.php'</script>";
        if($f2['TipoUsuario'] == "Estudiante") {
            echo "<script>location.href='Delayed.php?estudiante'</script>";
        } else if($f2['TipoUsuario'] == "Secretaria") {
            echo "<script>location.href='Delayed.php?secretaria'</script>";
        } else if($f2['TipoUsuario'] == "Decanatura") {
            echo "<script>location.href='Delayed.php?decanatura'</script>";
        } else if($f2['TipoUsuario'] == "Postgrado") {
            echo "<script>location.href='Delayed.php?postgrado'</script>";
        } else if($f2['TipoUsuario'] == "Cifi") {
            echo "<script>location.href='Delayed.php?cifi'</script>";
        }
        
    } else {
        //echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
        //echo "<script>location.href='Login/index.html'</script>";
       // echo "<script>location.href='Delayed.php?incorrecta'</script>";
       echo "<script>
        localStorage.setItem('StateMessageLogin', 1);
        localStorage.setItem('MessageLogin', 'Usuario o contraseña Incorrecta');
        localStorage.setItem('EmailLogin', '$username');
        location.href='../index.html';
        </script>";
    }
} else {
    //echo '<script>alert("ESTE USUARIO NO EXISTE, POR FAVOR COMUNIQUESE CON EL COORDINADOR PARA PODER INGRESAR")</script> ';
    //echo "<script>location.href='Login/index.html'</script>";
    //echo "<script>location.href='Delayed.php?noex'</script>";
    echo "<script>
        localStorage.setItem('StateMessageLogin', 1);
        localStorage.setItem('MessageLogin', 'Este usuario no existe, por favor comuniquese con el coordinador para poder ingresar');
        localStorage.setItem('EmailLogin', '$username');
        location.href='../index.html';
        </script>";
}
