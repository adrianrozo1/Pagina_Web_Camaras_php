<?php
include "db/db.php";

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio) VALUES (?,?,?)");
$stmt->bind_param("ssd", $nombre, $descripcion, $precio);
$stmt->execute();

header("Location: crud.php");
