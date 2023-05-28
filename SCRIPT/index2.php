<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilosINDEX.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@700&display=swap" rel="stylesheet">
    <title>CRUD_AURORA</title>
</head>

<body>
<?php
include_once "./conexion.php";
?>
<div class="menu">
        <div>
            <img src="img/aurora.png" alt="" class="iconopag">
            <a href="./index.html"><button class="back">Inicio</button></a>
        </div>
    </div>
<div class="botonesTablas">
  <div class="btn-group" role="group" aria-label="First group">
    <button id="botonALU" onclick="mostrarTablaALU()" type="button" class="btn btn-secondary btn-lg">ALUMNOS</button>
    <button id="botonPROF" onclick="mostrarTablaPROF()" type="button" class="btn btn-dark btn-sm">PROFESORES</button>
  </div>
</div>


<!-- Tabla ALUMNO -->
<?php
$result = $mysqli->query("SELECT alumnes.*, professor.nom_prof, professor.1rCognom_prof, professor.2nCognom_prof, curs.nom_curs FROM alumnes
    INNER JOIN curs ON alumnes.id_curs = curs.id_curs
    INNER JOIN materia ON curs.id_curs = materia.id_curs
    INNER JOIN professor ON materia.num_SS_prof = professor.num_SS_prof
    WHERE nom_materia='Tutoria'
");

// Comprobar si se ha enviado la solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    // Realizar la eliminación en la base de datos
    $eliminarQuery = "DELETE FROM alu_materia WHERE matricula = ?";
    $eliminarStmt = $mysqli->prepare($eliminarQuery);
    $eliminarStmt->bind_param("i", $matricula);
    $eliminarStmt->execute();
    $eliminarStmt->close();

    $eliminarQuery = "DELETE FROM ensenyament WHERE matricula = ?";
    $eliminarStmt = $mysqli->prepare($eliminarQuery);
    $eliminarStmt->bind_param("i", $matricula);
    $eliminarStmt->execute();
    $eliminarStmt->close();

    $eliminarQuery = "DELETE FROM alumnes WHERE matricula = ?";
    $eliminarStmt = $mysqli->prepare($eliminarQuery);
    $eliminarStmt->bind_param("i", $matricula);
    $eliminarStmt->execute();
    $eliminarStmt->close();

    // Redireccionar a la página actual para mostrar los datos actualizados
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<div id="tablaALU" class="tablas" style="display: block">
    <h3 class="titl">ALUMNOS </h3>
    <a href="alta-alumno.php"><button class="alta">Dar de alta</button></a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nº Matricula</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Nº Telefono</th>
                <th>DNI</th>
                <th>Curso</th>
                <th>Tutor</th>
                <th>Correo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    $fila = "<tr>";
                    $fila .= "<td>" . $row["matricula"] . "</td>";
                    $fila .= "<td>" . $row["nom_alu"] . " " . $row["1rCognom_alu"] . " " . $row["2nCognom_alu"] . "</td>";
                    $fila .= "<td>" . $row["adreça_alu"] . "</td>";
                    $fila .= "<td>" . $row["telefon_alu"] . "</td>";
                    $fila .= "<td>" . $row["DNI_alu"] . "</td>";
                    $fila .= "<td>" . $row["nom_curs"] . "</td>";
                    $fila .= "<td>" . $row["nom_prof"] . " " . $row["1rCognom_prof"] . " " . $row["2nCognom_prof"] . "</td>";
                    $fila .= "<td>" . $row["correu_alu"] . "</td>";
                    $fila .= "<td><a href='editar-alu.php?matricula=" . $row["matricula"] . "' class='btn btn-outline-dark btn-sm my-2'>Editar</a></td>";
                    $fila .= "<td><a href='?eliminar&matricula=" . $row["matricula"] . "' class='btn btn-outline-danger btn-sm my-2'>Eliminar</a></td></tr>";
                    echo $fila;
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Tabla PROFESORES -->
<?php
$result = $mysqli->query ("SELECT professor.* FROM professor");

// Comprobar si se ha enviado la solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['num_SS_prof'])) {
    $num_SS_prof = $_GET['num_SS_prof'];

    // Realizar la eliminación en la base de datos
    $eliminarQuery = "DELETE FROM materia WHERE num_SS_prof = ?";
    $eliminarStmt = $mysqli->prepare($eliminarQuery);
    $eliminarStmt->bind_param("i", $num_SS_prof);
    $eliminarStmt->execute();
    $eliminarStmt->close();

    $eliminarQuery = "DELETE FROM professor WHERE num_SS_prof = ?";
    $eliminarStmt = $mysqli->prepare($eliminarQuery);
    $eliminarStmt->bind_param("i", $num_SS_prof);
    $eliminarStmt->execute();
    $eliminarStmt->close();

    // Redireccionar a la página actual para mostrar los datos actualizados
    header("Location: index2.php");
    die();
}

?>

<div id="tablaPROF" class="tablas" style="display: none">

    <h3 class="titl">PROFESORES</h3>
    <a href= "alta-prof.php"><button class="alta">Dar de alta</button></a>

<table class="table table-bordered">  
<thead>
    <tr>
    <th>Nº Seguridad Social</th>
    <th>Nombre</th>
    <th>Dirección</th>
    <th>Nº Telefono</th>
    <th>DNI</th>
    <th>Correo</th>
    <th></th>
    <th></th>
    </tr>
</thead>
<tbody>
    <?php
    if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        $fila="<tr>";
        $fila=$fila."<td>" . $row["num_SS_prof"] . "</td>";
        $fila=$fila."<td>" . $row["nom_prof"] . " " . $row["1rCognom_prof"] . " " . $row["2nCognom_prof"] . "</td>";
        $fila=$fila."<td>" . $row["adreça_prof"] . "</td>";
        $fila=$fila."<td>" . $row["telefon_prof"] . "</td>";
        $fila=$fila."<td>" . $row["DNI_prof"] . "</td>";
        $fila=$fila."<td>" . $row["correu_prof"] . "</td>";
        $fila = $fila."<td><a href='editar-prof.php?num_SS_prof=".$row["num_SS_prof"]."' class='btn btn-outline-dark btn-sm my-2'>Editar</a></td>";
        $fila .= "<td><a href='?eliminar=" . $row["num_SS_prof"] . "' class='btn btn-outline-danger btn-sm my-2'>Eliminar</a></td></tr>";
        echo $fila;
        }
    }
    ?>
</tbody>
</table>
</div>

<script>
    var tablaALU = document.getElementById('tablaALU');
    var tablaPROF = document.getElementById('tablaPROF');
    var botonALU = document.getElementById('botonALU');
    var botonPROF = document.getElementById('botonPROF');

    function mostrarTablaALU() {
        tablaALU.style.display = 'block';
        tablaPROF.style.display = 'none';
        botonALU.className = "btn btn-secondary btn-lg";
        botonPROF.className = "btn btn-dark btn-sm";
    }
    function mostrarTablaPROF() {
        tablaALU.style.display = 'none';
        tablaPROF.style.display = 'block';
        botonALU.className = "btn btn-dark btn-sm";
        botonPROF.className = "btn btn-secondary btn-lg";
    }
</script>

<div class="footer">
        <div class="red">
            <h5 class="titl">REDES</h5>
            <a href=""><img class="redes" src="./img/facebook.png" alt=""></a>
            <a href=""><img class="redes" src="./img/twitter.png" alt=""></a>
            <a href=""><img class="redes" src="./img/insta.png" alt=""></a>
        </div>
        <hr>
        <div class="contacto">
            <h5 class="ctitl">CONTACTO</h5>
            <div class="row">
                <div class="column-2">
                    <p>aurora@gmail.com</p>
                </div>
                <div class="column-2">
                    <p>947296196</p>
                </div>
            </div>
        </div>
        <div class="loc">
            <p>Calle de Mallorca, 123, 08036 Barcelona, España© 2023 Centro de estudios aurora.</p>
        </div>
    </div>
</body>
</html>