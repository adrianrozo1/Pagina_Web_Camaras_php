<?php
require "db.php";

$email = "test@gmail.com"; // correo a verificar

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "✅ El usuario EXISTE en la base de datos";
} else {
    echo "❌ El usuario NO existe en la base de datos";
}
