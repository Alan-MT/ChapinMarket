<?php

$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores enviados desde el formulario
    $rol = $_POST["rol"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];
    $id = $_POST["id"];
    $sucursal = $_POST["sucursal"];
    $noCaja = empty($_POST["NoCaja"]) ? 'NULL' : $_POST["NoCaja"]; // Si NoCaja está vacío, asigna 'NULL'

    // Realiza cualquier validación necesaria aquí

    // Prepara una consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO supermercado.empleados(id, nombre, apellido, usuario, contrasenia, rol, sucursalactual, caja)
            VALUES ('$id', '$nombre', '$apellido', '$usuario', '$contrasenia', '$rol', '$sucursal', $noCaja)";

    $result = pg_query($conn, $sql);

    if ($result) {
        echo "Empleado registrado con éxito";
    } else {
        echo "Error al registrar el empleado: " . pg_last_error();
    }

    pg_close($conn);
}
?>
