<?php
 $_SESSION["current_page"] = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@700&display=swap" rel="stylesheet">
    <title>Aurora</title>
</head>

<body>
    <div class="menu">
        <div>
            <img src="img/aurora.png" alt="" class="iconopag">
        </div>
    </div>
    <div class="centrar">
        <div class="formulario">
            <h1 class="acceso">Acceso a los registros</h1>
            <form action="./sesion.php" method="get">
                <input autocomplete="off" class="usu" type="text" name="usuario" id="usuario" placeholder="Usuario"><p id="alerta" class="warning"></p>
                <input class="contra" type="password" name="contra" id="contra" placeholder="Contraseña"><p id="alerta1" class="warning">Usuario o Contraseña incorrectos</p>
                <br>
                <input type="submit" value="Iniciar Sesion" class="submit">
            </form>
        </div>
    </div>
</body>
<script src="valindex.js"></script>
</html>
