<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/estilos/login.css">
    <title>Login</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>Chapin Market</p>
        </div>
    </nav>
    <div class="form-box">
        <div class="login-container" id="login">
            <div class="top">
                <header>Login</header>
            </div>
            <form action="/controladores/controlUsuario.php" method="POST">
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Usuario" name="usuario" required="true"/>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Contraseña" name="contrasenia" required="true"/>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Iniciar Sesion" name="sesion"/>
            </div>
            </form>
        </div>
    </div>
</div>   

</body>
</html>