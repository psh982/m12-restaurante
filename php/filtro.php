<?php
if (isset($_GET['nombresala']) && !isset($_GET["id_sala"])) {
    // Recoger los valores del formulario
    $nombresala = $_GET["nombresala"];
    $id_sala = $_GET["id_sala"];
}

    // Consulta SQL con el filtro
    $sqlfiltro = "SELECT id_tipos, nombre_tipos, id_sala, id_mesa, nombre_mesa, sillas 
                  FROM tbl_tipos_salas tsa 
                  INNER JOIN tbl_salas sa ON tsa.id_tipos = sa.id_tipos_sala 
                  INNER JOIN tbl_mesas me ON sa.id_sala = me.id_sala_mesa
                  WHERE nombre_tipos = ? AND id_sala = ?";
    // Preparar la consulta
    $stmt = mysqli_prepare($conn, $sqlfiltro);
    // Asignar valores a los parámetros
    mysqli_stmt_bind_param($stmt, "si", $tipo, $id_sala);
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    // Obtener resultados
    $result = mysqli_stmt_get_result($stmt);
