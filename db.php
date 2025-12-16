<?php
// ================================
// CONEXIÓN A MYSQL - EASYPANEL
// ================================

// 🔹 Nombre EXACTO del servicio MySQL en EasyPanel
$host = "mysql-camaras";    

// 🔹 Nombre de la base de datos
$db   = "camarasweb";        

// 🔹 Usuario MySQL creado en EasyPanel
$user = "camarasuser";       

// 🔹 Contraseña MySQL
$pass = "d62e174e0c964eb61333"; 

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Error de conexión MySQL: " . $conn->connect_error);
}

// Charset correcto
$conn->set_charset("utf8mb4");

// echo "✅ Conexión exitosa"; // (solo para prueba)
?>
