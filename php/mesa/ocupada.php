<?php
include_once("../connection.php");

$id_mesa = $_POST['id'];
$sql = "SELECT estado_mesa FROM tbl_mesas me INNER JOIN tbl_estado es ON me.id_mesa = es.id_estado WHERE me.id_mesa = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $idMesa); // "i" indica que esperamos un parámetro de tipo entero
mysqli_stmt_execute($stmt);
$resultselect = mysqli_stmt_get_result($stmt);
$selectrow = mysqli_fetch_assoc($resultselect);
if ($selectrow['estado_mesa'] == "Ocupado") {
    // Obtener la fecha y hora actual
    $fechaSalida = date("Y-m-d H:i:s");
    // Actualizar el estado y la fecha de salida en la base de datos
    $sql = "UPDATE mesas SET estado = 'libre', fecha_salida = '$fechaSalida' WHERE id = $idMesa";
} else {
    $fechaEntrada = date("Y-m-d H:i:s");
    // Actualizar el estado y la fecha de entrada en la base de datos
    $sql = "UPDATE mesas SET estado = 'ocupada', fecha_entrada = '$fechaEntrada' WHERE id = $idMesa";
}


?>