<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection -> connect_error) {
    die("Ha ocurrido un problema al intentar conectarse con la base de datos: " . $connection -> connect_error);
}