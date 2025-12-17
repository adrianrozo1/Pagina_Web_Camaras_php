<?php
include "db/db.php";
$id = $_GET['id'];

$producto = $conn->query("SELECT * FROM productos WHERE id=$id")->fetch_assoc();
?>

<form method="POST" action="actualizar.php">
  <input type="hidden" name="id" value="<?= $producto['id'] ?>">
  <input name="nombre" value="<?= $producto['nombre'] ?>">
  <textarea name="descripcion"><?= $producto['descripcion'] ?></textarea>
  <input name="precio" value="<?= $producto['precio'] ?>">
  <button>Actualizar</button>
</form>
