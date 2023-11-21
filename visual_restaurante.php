<?php
// session_start();
// if (!isset($_SESSION['loginOk'])) {
//   header('Location: ' . './php/cerrar_sesion.php');
//   exit();
// } else {
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
    <div class="container-dropdown">
      <div class="dropdown">
        <label for="dropdown1">Sala</label>
        <select id="dropdown1">
          <?php
          // while ($fila = mysqli_fetch_assoc($resultadoTipoSala)) {
          //   $tipoSala = $fila['tipoSala'];
          //   echo '<option value=' . $tipoSala . '>' . $tipoSala . '</option>';
          // }
          ?>
        </select>
      </div>

      <div class="dropdown">
        <label for="dropdown2">Num. Sala</label>
        <select id="dropdown2">
          <?php
          // while ($fila = mysqli_fetch_assoc($resultadoTipoSala)) {
          //   $nombreSala = $fila['nombreSala'];
          //   echo '<option value=' . $nombreSala . '>' . $nombreSala . '</option>';
          // }
          ?>
        </select>
      </div>
      <div class="dropdown">
        <label for="dropdown3">Mesa</label>
        <select id="dropdown3">
          <?php
          // while ($fila = mysqli_fetch_assoc($resultadoMesa)) {
          //   $numSillas = $fila['numSillas'];
          //   echo '<option value=' . $numSillas . '>' . $numSillas . '</option>';
          // }
          ?>
        </select>
      </div>

      <div class="dropdown">
        <label for="dropdown4">Ocupación</label>
        <select id="dropdown4">
          <?php
          // while ($fila = mysqli_fetch_assoc($resultadoMesa)) {
          //   $ocupacion = $fila['ocupacion'];
          //   echo '<option value=' . $ocupacion . '>' . $ocupacion . '</option>';
          // }
          ?>
        </select>
      </div>
      <!-- Contenedor filtros -->
      <div class="dropdown">
        <label for="dropdown1">Sala</label>
        <select id="dropdown1">
          <option value="option1">Terraza</option>
          <option value="option2">Comedor</option>
          <option value="option3">Sala Privada</option>
        </select>
      </div>

      <div class="dropdown">
        <label for="dropdown2">Num. Sala</label>
        <select id="dropdown2">
          <option value="option1">1</option>
          <option value="option2">2</option>
          <option value="option3">3</option>
        </select>
      </div>

      <div class="dropdown">
        <label for="dropdown3">Mesa</label>
        <select id="dropdown3">
          <option value="option1">2</option>
          <option value="option2">4</option>
          <option value="option3">8</option>
          <option value="option3">16</option>
        </select>
      </div>

      <div class="dropdown">
        <label for="dropdown4">Ocupación</label>
        <select id="dropdown4">
          <option value="option1">Libres</option>
          <option value="option2">Ocupadas</option>
        </select>
      </div>

      <button class="btn btn-enviar">Aplicar filtros</button>
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
        //   if ($estado === 'ocupada') {
        //     echo "<a href='./php/ocupada.php?id='$id>
        //   <div class='mesa'>
        //     <button type='submit' class='btn btn-success boton-redondo' name='id' value='1'>
        //       <svg xmlns='http://www.w3.org/2000/svg' width='48' height='48' fill='currentColor'
        //         class='bi bi-x-square-fill' viewBox='0 0 16 16'>
        //         <path
        //           d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z' />
        //       </svg>
        //     </button>
        //     <a class='tipo-mesa'>" . $tipo_mesa . "</a>
        //     <a class='nombre-mesa'>" . $nombre_mesa . "</a>
        //   </div>
        // </a>'";
        //   } else if ($estado === 'desocupada') {
        //     echo "<div class='mesa' onclick='seleccionarMesa(1)'>
        //   <button type='button' class='btn btn-success boton-redondo' onclick='realizarAccion(1)'>
        //     <svg xmlns='http://www.w3.org/2000/svg' width='48' height='48' fill='currentColor'
        //       class='bi bi-check-square-fill' viewBox='0 0 16 16'>
        //       <path
        //         d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z' />
        //     </svg>
        //   </button>
        //   <a class='tipo-mesa'>" . $tipo_mesa . "</a>
        //   <a class='nombre-mesa'>" . $nombre_mesa . "</a>
        // </div>'";
        //   }
        
        // }
        ?>
        <div class="mesa" onclick="seleccionarMesa(1)">
          <button type="button" class="btn btn-success boton-redondo" onclick="realizarAccion(1)">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
              class="bi bi-check-square-fill" viewBox="0 0 16 16">
              <path
                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
            </svg>
          </button>
          <a class="tipo-mesa">4</a>
          <a class="nombre-mesa">comedor2-mesa1</a>
        </div>
        <div class="mesa" onclick="seleccionarMesa(2)">
          <button type="button" class="btn btn-success boton-redondo" onclick="realizarAccion(1)">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
              class="bi bi-check-square-fill" viewBox="0 0 16 16">
              <path
                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
            </svg>
          </button>
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