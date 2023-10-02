<?php

$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

$data = $_POST;
$user_id = $data['userId'];
$nombrec = $data['nombre2'];
$tele = $data['telefono2'];

$command = "UPDATE ventaCompra.cliente SET nombre = '$nombrec', telefono = '$tele' WHERE nit = CAST($user_id AS character varying)";
$result = pg_query($conn, $command);


if (!$result) {
    echo "Error al actualizar el cliente: " . pg_last_error($conn);
} else {
    echo "Cliente actualizado correctamente.";
}

// Cerrar la conexión a la base de datos
pg_close($conn);
?>
