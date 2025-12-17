<?php
include "db/db.php";
$id = $_GET['id'];

$conn->query("DELETE FROM productos WHERE id=$id");
header("Location: crud.php");
