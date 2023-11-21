<?php
session_start();
include './connection.php';
if (!isset($_SESSION["user"])) {
    header('Location: ./cerrar.php');
    exit();
}
?>




<form action="./mesa/ocupada.php" method="get">
<button id="btnActualizarMesa" class="rojo" name="id_mesa" value="2">Mesa</button>
</form>