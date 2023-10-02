<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../estilos/adm.css">
    <link rel="stylesheet" href="../estilos/lista-cajero-cliente.css">
</head>
<div id="dashboardMainContainer">
<div class="dashboard_sidebar" id="este">
<h3 class="dashboard_logo" id="titulo">Chapin Market</h3>
    <h6 id="sucursal">Sucursal Central</h6>
            <div class="dashboard_sidebar_user">
                <img src="/imagen/user.jpg" alt="User image"/>
                <span>Inventario Central</span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul class="dashboard_menu_lists">
                    <li>
                        <a href="../Empleados-Central/inventarioCentral.php" id="opcion"><i class="fa fa-dashboard menuIcons"></i>Principal</a>
                    </li>
                    <li>
                        <a href="../Empleados-Central/productoInventarioCentral.php" id="opcion1"><i class="fa fa-dashboard menuIcons"></i>Producto info.</a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="dashboard_content_container">
        <?php include('../componente/app-topnav.php')?>
        <div class="dashboard_content">
            <div class="column column-5">
                <h1 class="section_header"><i class="fa fa-list"></i>Lista de Productos en bodega</h1>
                <div class="section_content">
                    <div class="users">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Nombre del producto</th>
                                    <th>Cantidad en Bodega</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../controladores/inventario-productoCentral.php');
                                
                                foreach ($producto as $index => $producto) :
                                ?>
                                <tr>
                                    <td><?php echo $index +1?></td>
                                    <td class="productod"><?php echo $producto['productoid']; ?></td>
                                    <td class="nombre"><?php echo $producto['nombreproducto']; ?></td>
                                    <td class="cantidadB"><?php echo $producto['cantidadbodega']; ?></td>
                                    <td>
                                        <!--<button type="button" class="btn btn-primary btn-sm editbtn">Editar</button>-->
                                        <a href="" class="inventariup" data-userid="<?= $producto['idi']?>"><i   class="fa fa-pencil"></i>Agregar Sucursal</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function Script() {
        this.initialize = function() {
            this.registerEvents();
        };

        this.registerEvents = function() {
            document.addEventListener('click', function(e) {
                targetElement = e.target;
                classList = targetElement.classList;

                if (classList.contains('inventariup')) {
                    e.preventDefault();
                    //alert('editing');

                    cid = targetElement.closest('tr').querySelector('td.productod').innerHTML;
                    cnombre = targetElement.closest('tr').querySelector('td.nombre').innerHTML;
                    ccantidad = targetElement.closest('tr').querySelector('td.cantidadB').innerHTML;
                    userId = targetElement.dataset.userid;

                    BootstrapDialog.confirm({
                        title: 'AGREGAR '+ cid + ' ' +cnombre ,
                        message:  '<form>\
                        <div class="form-group">\
                        <label for="ID1">ID producto: </label>\
                        <input type="text" class ="form-control" id="ID1" value="' + cid +'" disabled >\
                        </div>\
                        <div class="form-group">\
                        <label for="nombre">Producto </label>\
                        <input type="text" class ="form-control" id="nombre" value="'+cnombre+'" disabled>\
                        </div>\
                        <div class="form-group">\
                        <label for="Cbodega">En bodega</label>\
                        <input type="text" class ="form-control" id="Cbodega" value="'+ccantidad+'" disabled>\
                        </div>\
                        <div class="form-group">\
                        <label for="estante">Cantidad Estante </label>\
                        <input type="text" class ="form-control" id="estante" required/>\
                        </div>\
                        <div class="form-group">\
                        <label for="NP">Numero de pasillo </label>\
                        <input type="text" class ="form-control" id="NP" required/>\
                        </div>\
                        </form>',
                        callback: function(isUpdate){
                         
                            if(isUpdate){
                                //alert('hi i updating');
                                var resultado = Resta();
                                $.ajax({
                                    method: 'POST',
                                    data: {
                                        userId: userId,
                                        Bodega: resultado,
                                        esante: document.getElementById('estante').value,
                                        pasillo: document.getElementById('NP').value,
                                    },
                                    url: '../controladores/ControlBodegaCrear.php',
                                    dataType: 'json',
                                    success: function(data){
                                        if(data.success){
                                            if(window.confirm(data.message)){
                                                location.reload();
                                            }
                                        } else window.alert(data.message);
                                    }
                                })
                            } 
                        }
                    });
                }
            });
        }
    }
        var scriptInstance = new Script();
        scriptInstance.initialize();
    
</script>
<script>

    // Obtener los valores de los campos
    function Resta() {
    // Obtener los valores de los campos
    var valorCbodega = parseFloat(document.getElementById("Cbodega").value);
    var valorEstante = parseFloat(document.getElementById("estante").value);

    // Realizar la resta
    var resultado = valorCbodega - valorEstante;

    // Mostrar el resultado debajo del botón
   // document.getElementById("resultado").textContent = "Resultado: " + resultado;

    // Retornar el resultado
    return resultado;

}
</script>
</body>
</html>