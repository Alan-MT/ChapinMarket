<?php

$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

$data = $_POST;
$user_id = $data['userId'];
$bodega = $data['Bodega'];
$estante = $data['esante'];
$cant= $data['pasillo'];
$command = "UPDATE supermercado.inventario SET cantidadbodega = $bodega, cantidadestante = $estante, numeropasillo = $cant WHERE idi = '$user_id'";
$result = pg_query($conn, $command);


if (!$result) {
    echo "Error al ingresar Producto: " . pg_last_error($conn);
} else {
    echo "Producto agregado correctamente.";
}

// Cerrar la conexión a la base de datos
pg_close($conn);
?>