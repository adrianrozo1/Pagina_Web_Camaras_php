<?php
// db.php

$host = getenv('DB_HOST') ?: 'db';
$user = getenv('DB_USER') ?: 'aplicamaras';
$pass = getenv('DB_PASS') ?: 'aplicamaras';
$db   = getenv('DB_NAME') ?: 'camarasDB';
$port = getenv('DB_PORT') ?: 3307;

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Error de conexión a la base de datos: " . $conn->connect_error);
}

// Opcional pero recomendado
$conn->set_charset("utf8mb4");

// Mensaje de prueba (puedes quitarlo luego)
// echo "✅ Conexión exitosa a la base de datos";
