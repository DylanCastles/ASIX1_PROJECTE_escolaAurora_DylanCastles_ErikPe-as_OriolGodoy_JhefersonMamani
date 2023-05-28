<!DOCTYPE html>
<html>
<head>
  <title>Página de inicio</title>
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
    function openPopup() {
      document.getElementById("popupOverlay").style.display = "block";
      document.getElementById("popupForm").style.display = "block";
    }

    function closePopup() {
      document.getElementById("popupOverlay").style.display = "none";
      document.getElementById("popupForm").style.display = "none";
    }
  </script>
</head>
<body>
  <h1>Página de inicio</h1>
  <button onclick="openPopup()">Mostrar formulario</button>

  <div id="popupOverlay" class="popup-overlay"></div>
  <div id="popupForm" class="popup-form">
    <h2>Formulario emergente</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" required><br>

      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" required><br>

      <input type="submit" value="Enviar">
      <button type="button" onclick="closePopup()">Cerrar</button>
    </form>
  </div>

  <?php
  // Verificar si se ha enviado el formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    // Aquí puedes realizar las acciones que desees con los datos, como guardarlos en una base de datos

    // Cerrar la ventana emergente después de enviar el formulario
    echo '<script type="text/javascript">closePopup();</script>';
  }
  ?>
</body>
</html>




