<?php
require 'db.php';

$result = $conn->query("SHOW TABLES");

if ($result) {
    echo "✅ Conectado correctamente<br><br>";
    while ($row = $result->fetch_array()) {
        echo $row[0] . "<br>";
    }
} else {
    echo "❌ Error en la consulta";
}
