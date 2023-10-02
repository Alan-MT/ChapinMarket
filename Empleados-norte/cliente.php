<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajero-Clientes</title>
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <link rel="stylesheet" href="../estilos/adm.css">
    <link rel="stylesheet" href="../estilos/lista-cajero-cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<div id="dashboardMainContainer">
    <?php include('../componente/sidebar-Cajero.php')?>
    <div class="dashboard_content_container">
        <?php include('../componente/app-topnav.php')?>
        <div class="dashboard_content">
            <div class="column column-5">
                <h1 class="section_header"><i class="fa fa-list"></i>Lista de Clientes</h1>
                <div class="section_content">
                    <div class="users">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>NIT</th>
                                    <th>Telefono</th>
                                    <th>Total Gastado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../controladores/ControlCliente-Cajero.php');
                                
                                foreach ($cliente as $index => $cliente) :
                                ?>
                                <tr>
                                    <td><?php echo $index +1?></td>
                                    <td class="customerName"><?php echo $cliente['nombre']; ?></td>
                                    <td class="customerNit"><?php echo $cliente['nit']; ?></td>
                                    <td class="customerPhone"><?php echo $cliente['telefono']; ?></td>
                                    <td class="total"><?php echo $cliente['total']; ?></td>
                                    <td>
                                        <!--<button type="button" class="btn btn-primary btn-sm editbtn">Editar</button>-->
                                        <a href="" class="updateUser" data-userid="<?= $cliente['nit']?>"><i   class="fa fa-pencil"></i>Editar</a>
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
                //confirmar admin y contrasenia inventada
                if (classList.contains('updateUser')) {
                    e.preventDefault();
                    //alert('editing');


                    Cnombre = targetElement.closest('tr').querySelector('td.customerName').innerHTML;
                    Ctelefono = targetElement.closest('tr').querySelector('td.customerPhone').innerHTML;
                    Cnit = targetElement.closest('tr').querySelector('td.customerNit').innerHTML;
                    BootstrapDialog.confirm({
                        title: 'Autenticacion de administrador',
                        message:  '<form>\
                        <div class="form-group">\
                        <label for="admin">Nombre: </label>\
                        <input type="text" class ="form-control" id="admin" value="">\
                        </div>\
                        <div class="form-group">\
                        <label for="contra">Telefono: </label>\
                        <input type="text" class ="form-control" id="contra" value="">\
                        </div>\
                        </form>',
                        callback: function(isAdmin){
                            if(isAdmin){
                                var adminName = document.getElementById('admin').value;
                                var adminPassword = document.getElementById('contra').value;
                                if (adminName == 'admin' && adminPassword == '1234'){
                                    BootstrapDialog.confirm({
                        title: 'Update '+ Cnombre + ' ' +Ctelefono + ' ' + Cnit,
                        message:  '<form>\
                        <div class="form-group">\
                        <label for="nombre1">Nombre: </label>\
                        <input type="text" class ="form-control" id="nombre1" value="'+Cnombre+'">\
                        </div>\
                        <div class="form-group">\
                        <label for="telefono1">Telefono: </label>\
                        <input type="text" class ="form-control" id="telefono1" value="'+Ctelefono+'">\
                        </div>\
                        </form>',
                        callback: function(isUpdate){
                            
                            if(isUpdate){
                                //alert('hi i updating');
                                $.ajax({
                                    method: 'POST',
                                    data: {
                                        userId: Cnit,
                                        nombre2: document.getElementById('nombre1').value,
                                        telefono2: document.getElementById('telefono1').value,
                                    },
                                    url: '../controladores/actualizar_cliente.php',
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
                                } else {
                                     alert('Llame al Administrador');
                                }
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
</body>
</html>