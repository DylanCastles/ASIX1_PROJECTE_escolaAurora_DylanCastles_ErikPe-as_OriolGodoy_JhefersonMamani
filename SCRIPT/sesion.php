<?php
session_start();
$usuario = $_GET['usuario'];
$contra = $_GET['contra'];
$message == 'Sesion iniciada correctamente';

if($usuario == 'admin' && $contra == 'asdASD123'){
    header("Location: ./inicio.php");
}else{
    printf("error en la conexión:");
    header("Location: ./index.php");
}
?>