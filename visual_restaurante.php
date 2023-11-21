<?php
// session_start();
// if (!isset($_SESSION['loginOk'])) {
//   header('Location: ' . './php/cerrar_sesion.php');
//   exit();
// } else {
include("./connection.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Mapa de Mesas - Restaurante</title>
  <script>
    function seleccionarMesa(numeroMesa) {
      alert('Mesa ' + numeroMesa + ' seleccionada');
    }
  </script>
  <link rel="stylesheet" href="./css/style_visual_restaurante.css">
</head>

<body>
  <div class="container">
    <!-- Contenedor incial -->
    <div class="container">
      <!-- Bienvenida usuario -->
      <h1 class="titulo-restaurante">Bienvenido Juan
        <?php
        // echo $nombre_usuario 
        ?>
      </h1>
      <h2> </h2>
      <!-- Botón cerrar sesión -->
    </div>
    <!-- Contenedor filtros -->
    <div class="container-dropdown">
      <div class="dropdown">
        <!-- EJEMPLO PARA PODER VER COMO QUEDARÍA-->
        <form class="formulario-filtros">
          <div class="dropdown">
            <label for="dropdown1">Sala</label>
            <select id="dropdown1">
              <option value="">Seleccione una sala</option>
              <?php
              try {
                /* Consulta para listar las notas del alumno */
                $sql_tipos_salas = "SELECT id_tipos, nombre_tipos, aforo FROM tbl_tipos_salas";
                $stmt_tipos_salas = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt_tipos_salas, $sql_tipos_salas);
                mysqli_stmt_execute($stmt_tipos_salas);

                $result_tipos_sala = mysqli_stmt_get_result($stmt_tipos_salas);

                if (mysqli_num_rows($result_tipos_sala) == 0) {
                  mysqli_close($conn);
                  echo "no";
                }

              } catch (Exception $e) {
                echo "Error in the database connection" . $e->getMessage();
                mysqli_close($conn);
                die();
              }
              foreach ($result_tipos_sala as $row) {
                $nombre_tipos = $row['nombre_tipos'];
                $id_tipos = $row['id_tipos'];
                echo '<option value=' . $id_tipos . '>' . $nombre_tipos . '</option>';
              }
              ?>
            </select>
          </div>
        </form>

        <div class="dropdown">
          <label for="dropdown2">Num. Sala</label>
          <select id="dropdown2">
            <option value="">Seleccione un número</option>
            <?php
            // try {
            //   /* Consulta para listar las notas del alumno */
            //   $sql_salas = "SELECT TS.nombre_tipos AS tipo_sala, S.nombre_sala, TS.aforo AS sillas FROM tbl_salas S JOIN tbl_tipos_salas TS ON S.id_tipos_sala = TS.id_tipos WHERE TS.id_tipos = ?";
            //   $stmt_salas = mysqli_stmt_init($conn);
            //   mysqli_stmt_prepare($stmt_salas, $sql_salas);
            //   mysqli_stmt_bind_param($stmt_salas, "i", $id_tipos);
            //   mysqli_stmt_execute($stmt_salas);

            //   $result_tipos_sala = mysqli_stmt_get_result($stmt_salas);

            //   if (mysqli_num_rows($result_tipos_sala) == 0) {
            //     mysqli_close($conn);
            //     echo "no";
            //   }

            // } catch (Exception $e) {
            //   echo "Error in the database connection" . $e->getMessage();
            //   mysqli_close($conn);
            //   die();
            // }
            // foreach ($result_tipos_sala as $row) {
            //   $num_sala = $row['nombre_sala'];
            //   $id_sala = $row['id_tipos'];
            //   echo '<option value=' . $num_sala . '>' . $num_sala . $id_tipos . '</option>';
            // }
            ?>
          </select>
        </div>

        <div class="dropdown">
          <label for="dropdown3">Mesa</label>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Seleccione una mesa
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#" data-value="2">2</a>
              <a class="dropdown-item" href="#" data-value="4">4</a>
              <a class="dropdown-item" href="#" data-value="8">8</a>
              <a class="dropdown-item" href="#" data-value="16">16</a>
            </div>
          </div>
          <!-- <select id="dropdown3">
              <option value="">Seleccione una mesa</option>
              <?php
              // while ($fila = mysqli_fetch_assoc($resultadoMesa)) {
              //   $numSillas = $fila['numSillas'];
              //   echo '<option value=' . $numSillas . '>' . $numSillas . '</option>';
              // }
              ?>
              <option value="option1">2</option>
              <option value="option2">4</option>
              <option value="option3">8</option>
              <option value="option4">16</option>
            </select> -->
        </div>

        <div class="dropdown">
          <label for="dropdown4">Ocupación</label>
          <select id="dropdown4">
            <option value="">Seleccione una opción</option>
            <?php
            // while ($fila = mysqli_fetch_assoc($resultadoMesa)) {
            //   $ocupacion = $fila['ocupacion'];
            //   echo '<option value=' . $ocupacion . '>' . $ocupacion . '</option>';
            // }
            ?>
            <option value="option1">Libres</option>
            <option value="option2">Ocupadas</option>
          </select>
        </div>

        <button type="submit" class="btn btn-enviar">Aplicar filtros</button>
        </form>
      </div>
      <hr class="hr hr-blurry" />
      <div class="container container-mapa-mesas">
        <!-- Contenedor mapa mesas -->
        <div id="mapa">
          <?php
          // while ($fila = mysqli_fetch_assoc($resultadoMesa)) {
          //   $tipo_mesa = $fila['sillas'];
          //   $nombre_mesa = $fila['nombre_mesa'];
          //   $estado = $fila['nombre_estado'];
          //   $id_mesa = $fila['id'];
          //   if ($estado === 'ocupada') {
          //     echo "<div class='mesa'>
          //     <a href='cambiar_ocupación.php?id_mesa=" . $id_mesa . "' class='circulo circulo-ocupada'></a>
          //     <a class='tipo-mesa'>" . $tipo_mesa . "</a>
          //     <a class='nombre-mesa'>" . $nombre_mesa . "</a>
          //   </div>'";
          //   } else if ($estado === 'desocupada') {
          //     echo "<div class='mesa'>
          //   <a href='cambiar_ocupación.php?id_mesa=" . $id_mesa . "' class='circulo circulo-desocupada'></a>
          //   <a class='tipo-mesa'>" . $tipo_mesa . "</a>
          //   <a class='nombre-mesa'>" . $nombre_mesa . "</a>
          // </div>'";
          //   }
          
          // }
          ?>
          <!-- EJEMPLO PARA PODER VER COMO QUEDARÍA-->
          <div class="mesa">
            <a href="cambiar_ocupación.php" class="circulo circulo-ocupada"></a>
            <a class="tipo-mesa">4</a>
            <a class="nombre-mesa">comedor2-mesa1</a>
          </div>
          <div class="mesa">
            <a href="cambiar_ocupación.php" class="circulo circulo-desocupada"></a>
            <a class="tipo-mesa">2</a>
            <a class="nombre-mesa">comedor2-mesa2</a>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
<?php
// }
?>