<?php
$connection = pg_connect("host=localhost dbname=chapinmarket user=postgres password=Ottopaty73");

if (!$connection) {
    die("Error en la conexión a la base de datos: " . pg_last_error());
}

if (isset($_POST['sesion'])) {
    $user = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Modifica la consulta SQL para usar placeholders $1 y $2
    $query = "SELECT * FROM supermercado.empleados WHERE usuario = $1 AND contrasenia = $2";
    $result = pg_query_params($connection, $query, array($user, $contrasenia));

    if ($result) {
        // Comprobar si se encontró un registro que coincide con el correo y la contraseña
        if (pg_num_rows($result) > 0) {
            $row = pg_fetch_assoc($result);
            $sucursal = $row['sucursalactual'];
            $rol = $row['rol'];

            if ($rol == 'Inventario') {
                if($sucursal == 'S1'){
                    echo '
                    <script>
                    window.location = "/Empleados-norte/inventario.php"
    
                    </script>
                    ';
                } else if ($sucursal == 'S2'){
                    echo '
                    <script>

                    window.location = "/Empleados-Surt/invetarioSur.php"
                    </script>
                    ';
                } else {
                    echo '
                    <script>
                    window.location =  "/Empleados-Central/inventarioCentral.php"
                    </script>
                    ';
                }
            } elseif ($rol == 'Cajero') {
                if($sucursal == 'S1'){
                    echo '
                    <script>
                    window.location = "/Empleados-norte/Cajero.php"
    
                    </script>
                    ';
                } else if ($sucursal == 'S2'){
                    echo '
                    <script>
                    window.location = "/Empleados-Surt/CajeroSur.php"
                    </script>
                    ';
                } else {
                    echo '
                    <script>
                    window.location = "/Empleados-Central/CajeroCentral.php"
                    </script>
                    ';
                }
            } elseif ($rol == 'Administrador') {
                echo '
                <script>
                window.location = "/administrador/admin.php"

                </script>
                ';
            } elseif ($rol == 'Bodega') {
                if($sucursal == 'S1'){
                    echo '
                    <script>
                    window.location = "/Empleados-norte/Bodega.php"
    
                    </script>
                    ';
                } else if ($sucursal == 'S2'){
                    echo '
                    <script>
                    window.location = "/Empleados-Surt/bodegaSur.php"
                    alert("BIENVENIDO a Sur ");
                    </script>
                    ';
                } else {
                    echo '
                    <script>
                    window.location = "/Empleados-Central/BodegaCen.php"
                    </script>
                    ';
                }
            }
        } else {
            echo '
            <script>
            alert("No existe este usuario");
            window.location = "/login.php";
            </script>
            ';
        }
    } else {
        echo "Error en la consulta: " . pg_last_error();
    }

    pg_close($connection);
} else {
    echo 'Algo está mal, inténtalo de nuevo';
}
?>