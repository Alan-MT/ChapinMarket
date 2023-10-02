<?php
$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

$sql = "SELECT i.idi, i.SucursalID, i.ProductoID, p.Nombre AS NombreProducto, p.Descripcion AS DescripcionProducto, i.CantidadBodega, i.CantidadEstante, i.NumeroPasillo
FROM supermercado.inventario AS i
JOIN supermercado.producto AS p ON i.ProductoID = p.idP
WHERE i.SucursalID = 'S2'
  AND i.CantidadEstante IS NOT NULL -- Verifica que la columna CantidadEstante no sea nula
  AND i.NumeroPasillo IS NOT NULL; -- Verifica que la columna NumeroPasillo no sea nula

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
