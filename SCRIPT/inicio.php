<?php
 $_SESSION["current_page"] = 2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilosINDEX.css">
    <link rel="stylesheet" href="./estilosOcultos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@700&display=swap" rel="stylesheet">
    <title>CRUD_AURORA</title>
</head>

<body>
  <div id="popupOverlay" class="popup-overlay"></div>
  <div id="popupForm" class="popup-form">
    <h2>Alta Alumno</h2>
    <form method="POST" action="./funciones/alta-alumno.php">
      <input type="number" name="matricula" id="matricula" placeholder="Nº Matrícula" required><br><p id="alerta" class="warning">El número de matrícula debe llevar 8 dígitos</p>
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" required><br><p id="alerta1" class="warning">No está permitido que el nombre no lleve otra cosa que no sean letras</p>
      <input type="text" name="apellido1" id="apellido1" placeholder="Primer Apellido" required><br><p id="alerta2" class="warning">No está permitido que el 1r apellido no lleve otra cosa que no sean letras</p>
      <input type="text" name="apellido2" id="apellido2" placeholder="Segundo Apellido" required><br><p id="alerta3" class="warning">No está permitido que el 2n apellido no lleve otra cosa que no sean letras</p>
      <input type="text" name="direccion" id="direccion" placeholder="Dirección" required><br><p id="alerta4" class="warning">La dirección debe ser la calle con su número de edificio/casa</p>
      <input type="number" name="telefono" id="telefono" placeholder="Teléfono" required><br><p id="alerta5" class="warning">El número de teléfono debe llevar 8 dígitos</p>
      <input type="number" name="dni" id="dni" placeholder="DNI" required><br><p id="alerta7" class="warning">El número de DNI debe llevar 7 dígitos</p>
        <select name="curso" id="curso" required>
            <option value="">Seleccionar curso</option>
            <option value="1">SMX1</option>
            <option value="2">SMX2</option>
            <option value="3">ASIX1</option>
            <option value="4">ASIX2</option>
            <option value="5">DAW2</option>
            <option value="6">EAS1</option>
            <option value="7">EAS2</option>
        </select><br>
      <input type="number" name="correo" id="correo" placeholder="Correo" required><br><p id="alerta6" class="warning">Vigila que el correo sea igual que la matrícula</p>

      <input type="submit" class="alta1" value="Enviar">
      <button type="button" class="alta1" onclick="closePopup()">Cerrar</button>
    </form>
  </div>
  <script src="./valDarAlta.js"></script>
  <!-- Editar Alumnos -->
  <div id="popupOverlay" class="popup-overlay"></div>
  <div id="popupForm" class="popup-form">
    <form method="POST" action="./funciones/editar-alu.php">
        <input type="hidden" name="guardarMatricula" value="<?php echo $matricula; ?>">
        <label for="nuevoCorreu">Correo electrónico:</label>
        <input type="email" name="nuevoCorreu" value="<?php echo htmlspecialchars($correu_alu); ?>">
        <label for="nuevoNom">Nombre:</label>
        <input type="text" name="nuevoNom" value="<?php echo htmlspecialchars($nom_alu); ?>">
        <label for="nuevoPrimerCognom">Primer apellido:</label>
        <input type="text" name="nuevoPrimerCognom" value="<?php echo htmlspecialchars($primerCognom_alu); ?>">
        <label for="nuevoSegundoCognom">Segundo apellido:</label>
        <input type="text" name="nuevoSegundoCognom" value="<?php echo htmlspecialchars($segundoCognom_alu); ?>">
        <label for="nuevaDireccion">Dirección:</label>
        <textarea name="nuevaDireccion"><?php echo htmlspecialchars($adreça_alu); ?></textarea>
        <label for="nuevoTelefono">Teléfono:</label>
        <input type="text" name="nuevoTelefono" pattern="[0-9]{9}" maxlength="9" value="<?php echo htmlspecialchars($telefon_alu); ?>">
        <label for="nuevoDNI">DNI:</label>
        <input type="text" name="nuevoDNI" pattern="[0-9]{1,8}" maxlength="8" value="<?php echo htmlspecialchars($DNI_alu); ?>">
        <label for="nuevoIdCurs">ID del curso:</label>
        <select name="nuevoIdCurs">
            <option value="">Seleccionar curso</option>
            <option value="1" <?php if ($id_curs == 1) echo "selected"; ?>>SMX1</option>
            <option value="2" <?php if ($id_curs == 2) echo "selected"; ?>>SMX2</option>
            <option value="3" <?php if ($id_curs == 3) echo "selected"; ?>>ASIX1</option>
            <option value="4" <?php if ($id_curs == 4) echo "selected"; ?>>ASIX2</option>
            <option value="5" <?php if ($id_curs == 5) echo "selected"; ?>>DAW2</option>
            <option value="6" <?php if ($id_curs == 6) echo "selected"; ?>>EAS1</option>
            <option value="7" <?php if ($id_curs == 7) echo "selected"; ?>>EAS2</option>
        </select>
        <button type="submit">Guardar cambios</button>
    </form>
   </div>
</div>
<?php
include_once "./conexion.php";
?>
<div class="menu">
        <div>
            <img src="img/aurora.png" alt="" class="iconopag">
            <a href="./index.php"><button class="back">Inicio</button></a>
        </div>
    </div>
<div class="botonesTablas">
  <div class="btn-group" role="group" aria-label="First group">
    <button id="botonALU" onclick="mostrarTablaALU()" type="button" class="alunbot btn btn-secondary btn-lg">ALUMNOS</button>
    <button id="botonPROF" onclick="mostrarTablaPROF()" type="button" class="profbot btn btn-dark btn-sm">PROFESORES</button>
  </div>
</div>


<!-- Tabla ALUMNO -->
<?php
$result = $mysqli->query ("SELECT alumnes.*, professor.nom_prof, professor.1rCognom_prof, professor.2nCognom_prof, curs.nom_curs FROM alumnes
    INNER JOIN curs ON alumnes.id_curs = curs.id_curs
    INNER JOIN materia ON curs.id_curs = materia.id_curs
    INNER JOIN professor ON materia.num_SS_prof = professor.num_SS_prof
    WHERE nom_materia='Tutoria'
");
?>
<style>
    .popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
}

.popup-form {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    z-index: 10000;
}
</style>
<script>
     function openPopupEdit() {
      document.getElementById("popupOverlayE").style.display = "block";
      document.getElementById("popupFormE").style.display = "block";
    }

    function closePopupEdit() {
      document.getElementById("popupOverlayE").style.display = "none";
      document.getElementById("popupFormE").style.display = "none";
    }
    function openPopup() {
      document.getElementById("popupOverlay").style.display = "block";
      document.getElementById("popupForm").style.display = "block";
    }

    function closePopup() {
      document.getElementById("popupOverlay").style.display = "none";
      document.getElementById("popupForm").style.display = "none";
    }
  </script>
<div id="tablaALU" class="tablas" style="display: block">
  
    <h3 class="titl">ALUMNOS </h3>
    <button onclick="openPopup()" class="alta">Dar de alta</button>

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
    </tr>
</thead>

<tbody>
    <?php
    if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        $fila="<tr>";
        $fila=$fila."<td>" . $row["matricula"] . "</td>";
        $fila=$fila."<td>" . $row["nom_alu"] . " " . $row["1rCognom_alu"] . " " . $row["2nCognom_alu"] . "</td>";
        $fila=$fila."<td>" . $row["adreça_alu"] . "</td>";
        $fila=$fila."<td>" . $row["telefon_alu"] . "</td>";
        $fila=$fila."<td>" . $row["DNI_alu"] . "</td>";
        $fila=$fila."<td>" . $row["nom_curs"] . "</td>";
        $fila=$fila."<td>" . $row["nom_prof"] . " " . $row["1rCognom_prof"] . " " . $row["2nCognom_prof"] . "</td>";
        $fila=$fila."<td>" . $row["correu_alu"] . "</td>";
        $fila=$fila."<td><a href='?eliminar&matricula=".$row["matricula"]."' class='elim btn btn-outline-danger btn-sm my-2'>Eliminar</a><a href='./funciones/editar-alu.php?matricula=" . $row["matricula"] . "' class='edit btn btn-outline-dark btn-sm my-2'>Editar</a></td>";
        echo $fila;
        }
    }
    ?>
    <?php
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
  echo "<script>
  location.href ='inicio.php';
  </script>";
}
?>
</tbody>
</table>
</div>

<!-- Tabla PROFESORES -->
<?php
$result = $mysqli->query ("SELECT professor.* FROM professor");
// Comprobar si se ha enviado la solicitud de eliminación
?>
<div id="popupOverlay1" class="popup-overlay1"></div>
  <div id="popupForm1" class="popup-form1">
    <h2>Alta Profesor</h2>
    <form method="POST" action="./funciones/alta-prof.php">
      <input type="text" name="social" id="social" placeholder="Nº Seguridad Social" required><br>  
      <input type="text" name="nombrep" id="nombrep" placeholder="Nombre" required><br>
      <input type="text" name="apellido1" id="apellido1" placeholder="Primer Apellido" required><br>
      <input type="text" name="apellido2" id="apellido2" placeholder="Segundo Apellido" required><br>
      <input type="text" name="adreça" id="adreça" placeholder="Dirección" required><br>
      <input type="text" name="telefono" id="telefono" placeholder="Teléfono" required><br>
      <input type="text" name="dnip" id="dnip" placeholder="DNI" required><br>
      <input type="text" name="correo" id="correo" placeholder="Correo" required><br>

      <input type="submit" class="alta1" value="Enviar">
      <button type="button" class="alta1" onclick="closePopup1()">Cerrar</button>
    </form>
  </div>
  <style>
    .popup-overlay1 {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
}

.popup-form1 {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    z-index: 10000;
}
</style>
<script>
    function openPopup1() {
      document.getElementById("popupOverlay1").style.display = "block";
      document.getElementById("popupForm1").style.display = "block";
    }

    function closePopup1() {
      document.getElementById("popupOverlay1").style.display = "none";
      document.getElementById("popupForm1").style.display = "none";
    }
  </script>
<div id="tablaPROF" class="tablas" style="display: none">

    <h3 class="titl">PROFESORES</h3>
    <button class="alta" onclick="openPopup1()">Dar de alta</button>

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
        $fila=$fila."<td><a href='inicio.php?eliminar&num_SS_prof=".$row["num_SS_prof"]."' class='elim btn btn-outline-danger btn-sm my-2'>Eliminar</a><a href='./funciones/editar-prof.php?num_SS_prof=".$row["num_SS_prof"]."' class='edit btn btn-outline-dark btn-sm my-2'>Editar</a></td>";        
        echo $fila;
        }
    }
  ?>
<?php
// Comprobar si se ha enviado la solicitud de eliminación
if (isset($_GET['eliminar']) && isset($_GET['num_SS_prof'])) {
  $num_SS_prof = $_GET['num_SS_prof'];

  // Realizar la eliminación en la base de datos
  $eliminarQuery = "UPDATE materia JOIN ensenyament ON materia.num_SS_prof SET materia.num_SS_prof = (SELECT num_SS_prof from professor order by num_SS_prof asc limit 1), ensenyament.num_SS_prof = (SELECT num_SS_prof from professor order by num_SS_prof asc limit 1) WHERE materia.num_SS_prof = ?";
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
  echo "<script>
location.href ='inicio.php';
</script>";
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
        botonALU.className = "alunbot btn btn-secondary btn-lg";
        botonPROF.className = "profbot btn btn-dark btn-sm";
    }
    function mostrarTablaPROF() {
        tablaALU.style.display = 'none';
        tablaPROF.style.display = 'block';
        botonALU.className = "profbot btn btn-dark btn-sm";
        botonPROF.className = "alunbot btn btn-secondary btn-lg";
    }
</script>

<div class="footer">
        <div class="red">
            <h5 class="titl">REDES</h5>
            <a href=""><img class="redes" src="./img/facebook.png" alt=""></a>
            <a href=""><img class="redes" src="./img/twitter.png" alt=""></a>
            <a href=""><img class="redes" src="./img/insta.png" alt=""></a>
        </div>
        <div class="linea"><hr></div>
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