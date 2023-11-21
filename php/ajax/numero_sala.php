<?php
// obtener_numeros_sala.php

// ... conexión a la base de datos ...
include("../connection.php");
$tipo_sala = $_GET['tipo_sala'];

$sql = "SELECT DISTINCT nombre_sala FROM tbl_tipos_salas tsa 
        INNER JOIN tbl_salas sa ON tsa.id_tipos = sa.id_tipos_sala 
        INNER JOIN tbl_mesas me ON sa.id_sala = me.id_sala_mesa 
        INNER JOIN tbl_estado esta ON me.id_estado_mesa = esta.id_estado
        WHERE nombre_tipos = ?";

$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $tipo_sala);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Construye las opciones del segundo dropdown
$options = '<option value="">Seleccione un número</option>';
foreach ($result as $row) {
  $num_sala = $row['nombre_sala'];
  $options .= '<option value="' . $num_sala . '">' . $num_sala . '</option>';
}

echo $options;

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>