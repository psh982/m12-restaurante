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
    // Función para manejar la selección de mesas (puedes personalizar según tus necesidades)
    function seleccionarMesa(numeroMesa) {
      alert('Mesa ' + numeroMesa + ' seleccionada');
      // Puedes agregar aquí lógica adicional, como redireccionar a una página de pedidos, etc.
    }
  </script>
  <link rel="stylesheet" href="./css/style_visual_restaurante.css">
</head>

<body>
  <div class="container">
    <!-- Contenedor incial -->
    <div class="container">
      <!-- Bienvenida usuario -->
      <h1>Mapa de Mesas - Restaurante</h1>
      <!-- Botón cerrar sesión -->
    </div>
    <div class="container">
      <!-- Contenedor filtros -->
    </div>
    <div class="container container-mapa-mesas">
      <!-- Contenedor mapa mesas -->
      <div id="mapa">
        <!-- Ejemplo de mesas, puedes duplicar este bloque según el número de mesas en tu restaurante -->
        <div class="mesa" onclick="seleccionarMesa(1)">
          <button type="button" class="btn btn-success boton-redondo" onclick="realizarAccion(1)">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
              class="bi bi-check-square-fill" viewBox="0 0 16 16">
              <path
                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
            </svg>
          </button>
          <a class="tipo-mesa">2</a>
          <a class="nombre-mesa">C2-mesa1</a>
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
          <a class="nombre-mesa">C2-mesa2</a>
        </div>
        <div class="mesa" onclick="seleccionarMesa(3)">
          <button type="button" class="btn btn-success boton-redondo" onclick="realizarAccion(1)">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
              class="bi bi-check-square-fill" viewBox="0 0 16 16">
              <path
                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
            </svg>
          </button>
          <a class="tipo-mesa">4</a>
          <a class="nombre-mesa">C2-mesa3</a>
        </div>
        <div class="mesa" onclick="seleccionarMesa(4)">
          <button type="button" class="btn btn-success boton-redondo" onclick="realizarAccion(1)">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
              class="bi bi-check-square-fill" viewBox="0 0 16 16">
              <path
                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
            </svg>
          </button>
          <a class="tipo-mesa">2</a>
          <a class="nombre-mesa">C2-mesa4</a>
        </div>
        <div class="mesa" onclick="seleccionarMesa(5)">
          <button type="button" class="btn btn-success boton-redondo" onclick="realizarAccion(1)">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
              class="bi bi-check-square-fill" viewBox="0 0 16 16">
              <path
                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
            </svg>
          </button>
          <a class="tipo-mesa">4</a>
          <a class="nombre-mesa">C2-mesa5</a>
        </div>
        <div class="mesa" onclick="seleccionarMesa(6)">
          <button type="button" class="btn btn-success boton-redondo" onclick="realizarAccion(1)">
            <img src="./images/x-square-fill.svg" alt="Botón de acción" width="48" height="48" fill="currentColor"
              class="bi bi-check-square-fill" viewBox="0 0 16 16">
          </button>
          <a class="tipo-mesa">2</a>
          <a class="nombre-mesa">C2-mesa6</a>
        </div>
        <!-- Fin del ejemplo -->
      </div>
    </div>
  </div>
</body>

</html>