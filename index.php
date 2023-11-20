<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/9b3003b0ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/error.css">
    <title>Restaurante</title>
</head>
<body>
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="./php/login.php" method="post">
                    <h2>Iniciar Sesión</h2>
                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="user" id="user" placeholder="Usuario">
                    </div>
                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="pwd" id="pwd" placeholder="Contraseña">
                    </div>
                    <?php if (isset($_GET['exist'])) {echo "<p class='errorlogin'> Usuario o Contraseña equivocada </p>";} ?>
                    <br>
                    <button type="submit" name="login" value="Login">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>