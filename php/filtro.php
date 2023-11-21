<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        include("./connection.php");
        $nombresala = "Terraza";
        $id_sala = 2;
        // Consulta SQL con el filtro
        $sqlfiltro = "SELECT id_tipos, nombre_tipos, id_sala, id_mesa, nombre_mesa, sillas, estado_nombre FROM tbl_tipos_salas tsa 
                    INNER JOIN tbl_salas sa ON tsa.id_tipos = sa.id_tipos_sala 
                    INNER JOIN tbl_mesas me ON sa.id_sala = me.id_sala_mesa 
                    INNER JOIN tbl_estado esta ON me.id_estado_mesa = esta.id_estado
                    WHERE nombre_tipos = ? AND id_sala = ?";
        // Preparar la consulta
        $stmt = mysqli_prepare($conn, $sqlfiltro);
        // Asignar valores a los parámetros
        mysqli_stmt_bind_param($stmt, "si", $nombresala, $id_sala);
        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);
        // Obtener resultados
        $resultadoMesa = mysqli_stmt_get_result($stmt);
        while ($fila = mysqli_fetch_assoc($resultadoMesa)) {
           $sillas = $fila['sillas'];
           $nombre_mesa = $fila['nombre_mesa'];
           $estado = $fila['estado_nombre'];
           
           if ($estado == 'Ocupado') {
             echo "<a href='./php/ocupada.php?id='$id>
           <div class='mesa'>
             <button type='submit' class='btn btn-success boton-redondo' name='id' value='1'>
               <svg xmlns='http:www.w3.org/2000/svg' width='48' height='48' fill='currentColor'
                 class='bi bi-x-square-fill' viewBox='0 0 16 16'>
                 <path
                   d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z' />
               </svg>
             </button>
             <a class='tipo-mesa'>" . $sillas . "</a>
             <a class='nombre-mesa'>" . $nombre_mesa . "</a>
           </div>
         </a>'";
           } else if ($estado == 'Libre') {
             echo "<div class='mesa' onclick='seleccionarMesa(1)'>
           <button type='button' class='btn btn-success boton-redondo' onclick='realizarAccion(1)'>
             <svg xmlns='http:www.w3.org/2000/svg' width='48' height='48' fill='currentColor'
               class='bi bi-check-square-fill' viewBox='0 0 16 16'>
               <path
                 d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z' />
             </svg>
           </button>
           <a class='tipo-mesa'>" . $sillas . "</a>
           <a class='nombre-mesa'>" . $nombre_mesa . "</a>
         </div>'";
           }
        
        }
?>
</body>
</html>