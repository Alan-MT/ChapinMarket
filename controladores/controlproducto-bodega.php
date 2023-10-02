<?php
$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

$sql = "SELECT * FROM supermercado.producto";
$result = pg_query($conn, $sql);
?>

<?php
$producto = [];
while ($row = pg_fetch_assoc($result)) {
    $producto[] = $row;
}

pg_close($conn);
?>
