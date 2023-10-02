<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-empleados</title>
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link rel="stylesheet" href="../estilos/adm.css">
    <link rel="stylesheet" href="../estilos/lista.css">
</head>

<body>
    <div id="dashboardMainContainer">
        <?php include('../componente/app-sidebar.php')?>
        <div class="dashboard_content_container">
            <?php include('../componente/app-topnav.php')?>
            <div class="dashboard_content">
                <div class="row">
                    <div class="column column-4">
                        <h1 class="section_header"><i class="fa fa-list"></i>Lista de Empleados</h1>
                        <div class="section_content">
                            <div class="users">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Sucursal</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Incluye el archivo PHP que contiene la lógica de consulta y preparación de datos
                                        include('../controladores/controlempleados.php');
                                        
                                        // Itera a través de los empleados y muestra los datos en la tabla
                                        foreach ($empleados as $empleado) :
                                        ?>
                                        <tr>
                                            <td><?php echo $empleado['id']; ?></td>
                                            <td><?php echo $empleado['nombre']; ?></td>
                                            <td><?php echo $empleado['apellido']; ?></td>
                                            <td><?php echo $empleado['sucursalactual']; ?></td>
                                            <td><?php echo $empleado['rol']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>


                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <div class="column column-5">
                        <h1 class="section_header"><i class="fa fa-list"></i>Tipos de Sursales</h1>
                        <tr>
                            <h3>S1 es Norte</h3>
                            <h3>S2 es Sur</h3>
                            <h3>S3 es Central</h3>
                        </tr>
                        <div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>