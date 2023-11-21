<?php
session_start();
include './connection.php';
if (!isset($_SESSION["user"])) {
    header('Location: ./cerrar.php');
    exit();
}
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Mapa de Mesas - Restaurante</title>
    <script>
        function seleccionarMesa(numeroMesa) {
        alert('Mesa ' + numeroMesa + ' seleccionada');
        }
    </script>
<link rel="stylesheet" href="../css/style_visual_restaurante.css">
</head>

<body>
  <div class="container">
    <!-- Contenedor incial -->
    <div class="container">
      <!-- Bienvenida usuario -->
      <h1 class="titulo-restaurante">
        <?php
        echo "Bienvenido " . $_SESSION['user'];
        ?>
      </h1>
      <h2> </h2>
      <!-- Botón cerrar sesión -->
    </div>
    <!-- Contenedor filtros -->
    <?php
    ?>
    <div class="container-dropdown">
      <div class="dropdown">
        <!-- EJEMPLO PARA PODER VER COMO QUEDARÍA-->
        <form class="formulario-filtros" action="./home.php" method="get" id="nocargar">
        <div class="dropdown">
        <label for="dropdown1">Sala</label>
        <!-- Selector para sala -->
        <select id="dropdown1" name="sala">
          <option value="">Seleccione una sala</option>
          <?php
            $sql_tipos_salas = "SELECT id_tipos, nombre_tipos, aforo FROM tbl_tipos_salas";
            $stmt_tipos_salas = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt_tipos_salas, $sql_tipos_salas);
            mysqli_stmt_execute($stmt_tipos_salas);
            $result_tipos_sala = mysqli_stmt_get_result($stmt_tipos_salas);

            if (mysqli_num_rows($result_tipos_sala) == 0) {
              mysqli_close($conn);
              echo "No";
            }

            foreach ($result_tipos_sala as $row) {
              $nombre_tipos = $row['nombre_tipos'];
              $id_tipos = $row['id_tipos'];
              $selected = ($_GET['sala'] == $nombre_tipos) ? 'selected' : '';
          ?>
          <option value="<?php echo $nombre_tipos ?>" <?php echo $selected ?>><?php echo $nombre_tipos ?></option>
          <?php
            }
          ?>
        </select>
        <!-- Acaba el selector para sala -->
        </div>
        <div class="dropdown">
          <label for="dropdown2">Num. Sala</label>
          <select id="dropdown2" name="num_sala">
            <option value="">Seleccione un número</option>
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





<!-- Agrega el script de JavaScript -->
<script>

  // Cuando se cambia la selección en el primer dropdown
  $('#dropdown1').on('change', function() {
    // Obtén el valor seleccionado del primer dropdown
    var selectedTipoSala = $(this).val();
    console.log('Tipo de Sala seleccionado:', selectedTipoSala);
    // Realiza una solicitud AJAX para obtener los números de sala correspondientes al tipo de sala seleccionado
    $.ajax({
      url: './ajax/numero_sala.php', // Debes crear este archivo para manejar la lógica de la base de datos
      type: 'GET',
      data: { tipo_sala: selectedTipoSala },
      success: function(data) {
        // Limpia el segundo dropdown
        $('#dropdown2').empty();
        // Agrega las nuevas opciones al segundo dropdown
        $('#dropdown2').html(data);
      },
      error: function(error) {
        console.log(error);
      }
    });
  });
    // Prevenir la recarga del formulario al hacer clic en "filtrar"
    
    $('#nocargar').on('submit', function(event) {
    event.preventDefault();
  });
</script>

</body>
</html>
<?php
// }
?>