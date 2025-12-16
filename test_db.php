<?php
require 'db.php';

$result = $conn->query("SHOW TABLES");

if ($result) {
    echo "✅ CONECTADO A LA BASE DE DATOS<br><br>";
    while ($row = $result->fetch_array()) {
        echo "📁 " . $row[0] . "<br>";
    }
} else {
    echo "❌ No se pudieron obtener las tablas";
}
