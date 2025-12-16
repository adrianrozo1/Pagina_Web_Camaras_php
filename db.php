<?php
// --- Configuraciones de la Base de Datos ---

// Servidor de la base de datos (copiado de la interfaz de Login)
$host = "camarasweb_camarabase"; 

// Nombre de la base de datos 
$db = "camarasweb_php";

// Nombre de usuario de MySQL (copiado de la interfaz de Login)
$user = "mysql";

// **IMPORTANTE**: Reemplaza 'TU_CONTRASEÑA_REAL' con la contraseña que tienes oculta
$pass = "587e8215291ae15adc3b"; 

// --- Establecer la Conexión ---
$conn = new mysqli($host, $user, $pass, $db);

// --- Verificación y Manejo de Errores ---
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer el juego de caracteres a UTF-8
$conn->set_charset("utf8");

// La conexión está lista en $conn.
?>