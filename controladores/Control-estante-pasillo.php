<?php

$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

$data = $_POST;
$user_id = $data['userId'];
$sucursal = $data['sucursal'];
$idp = $data['productid'];
$cant= $data['cantidad'];
$command = "INSERT INTO supermercado.inventario VALUES ($user_id, '$sucursal', '$idp', $cant)";
$result = pg_query($conn, $command);


if (!$result) {
    echo "Error al ingresar Producto: " . pg_last_error($conn);
} else {
    echo "Producto agregado correctamente.";
}

// Cerrar la conexión a la base de datos
pg_close($conn);
?>