<?php
$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

$sql = "SELECT * FROM ventaCompra.cliente";
$result = pg_query($conn, $sql);
?>

<?php
$cliente = [];
while ($row = pg_fetch_assoc($result)) {
    $cliente[] = $row;
}

pg_close($conn);
?>

