<?php

$mysqli = new MySQLi("localhost", "root", "", "committee");

//QV&v(9tC&Q&k)k3q

mysqli_set_charset($mysqli, 'utf8');

if ($mysqli->connect_errno) {

  die("Fallo la conexión a MySQL: (" . $mysqli->mysqli_connect_errno() . ") " . $mysqli->mysqli_connect_error());
} else {
  //  echo 'Conectado';
}
