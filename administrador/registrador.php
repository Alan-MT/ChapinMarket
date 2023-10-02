<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Registrar</title>
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link rel="stylesheet" href="../estilos/adm.css">
    <link rel="stylesheet" href="../estilos/registro.css">
</head>
<body>
    <div id="dashboardMainContainer">
    <?php include('../componente/app-sidebar.php')?>
        <div class="dashboard_content_container">
        <?php include('../componente/app-topnav.php')?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="Container">
                    <form action="../controladores/controlRegistro.php" class="formulario" method="POST">
                    <div>
                            <label >Rol</label>
                            <select name="rol" id="rol" class="forminput">
                                <option value="cajero">Cajero</option>
                                <option value="Bodega">Bodega</option>
                                <option value="Inventario">Inventario</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Nombre</label>
                            <input type="text" class="forminput" id="nombre" name ="nombre" required/>
                        </div>
                        <div>
                            <label for="">Apellido</label>
                            <input type="text" class="forminput" id="apellido" name ="apellido" required/>
                        </div>
                        <div>
                            <label for="">Usuario</label>
                            <input type="text" class="forminput" id="usuario" name ="usuario" required/>
                        </div>
                        <div>
                            <label for="">Contraseña</label>
                            <input type="text" class="forminput" id="contrasenia" name ="contrasenia" required/>
                        </div>
                        <div>
                            <label for="">ID</label>
                            <input type="text" class="forminput" id="id" name ="id" required/>
                        </div>

                        <div>
                        <label >Sucursal</label>
                            <select name="sucursal" id="sucursal" class="forminput">
                                <option value="S1">Norte</option>
                                <option value="S2">Sur</option>
                                <option value="S3">Central</option>
                            </select>
                        <div>
                            <label for="">Caja</label>
                            <input type="number" class="forminput" id="NoCaja" name ="NoCaja" required/>
                        </div>
                        <button type="submit" name="registro" class="appBtn"><i class="fa fa-plus"></i>  Crear empleado</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../script/admini.js"></script>


</body>
</html>