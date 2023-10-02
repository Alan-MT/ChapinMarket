<?php
$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

$sql = "SELECT i.idi, i.SucursalID, i.ProductoID, p.Nombre AS NombreProducto, i.CantidadBodega, i.CantidadEstante, i.NumeroPasillo
FROM supermercado.inventario AS i
JOIN supermercado.producto AS p ON i.ProductoID = p.idP
WHERE i.SucursalID = 'S1';
";
$result = pg_query($conn, $sql);
?>

<?php
$producto = [];
while ($row = pg_fetch_assoc($result)) {
    $producto[] = $row;
}

pg_close($conn);
?>

