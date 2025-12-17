<?php
include "db/db.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$stmt = $conn->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=? WHERE id=?");
$stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $id);
$stmt->execute();

header("Location: crud.php");
