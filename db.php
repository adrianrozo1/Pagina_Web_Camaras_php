<?php
// Configuración MySQL en EasyPanel

$host = "camarasweb_pagianbase";     // NOMBRE DEL SERVICIO MYSQL
$db   = "camarasweb";        // BASE DE DATOS REAL
$user = "mysql";       // USUARIO MYSQL
$pass = "d62e174e0c964eb61333"; // CONTRASEÑA REAL

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
