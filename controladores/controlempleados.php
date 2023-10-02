<?php
$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

// Realiza una consulta SQL para seleccionar todos los empleados
$sql = "SELECT * FROM supermercado.empleados WHERE NOT rol = 'Administrador'";
$result = pg_query($conn, $sql);

// Itera a través de los resultados y almacena los datos en un arreglo
$empleados = [];
while ($row = pg_fetch_assoc($result)) {
    $empleados[] = $row;
}

// Cierra la conexión a la base de datos
pg_close($conn);
?>
