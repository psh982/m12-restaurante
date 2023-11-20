<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/9b3003b0ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Restaurante</title>
</head>
<body>
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="" method="POST">
                    <h2>Iniciar Sesión</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="name" required>
                        <label for="#">Email</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" required>
                        <label for="#">Contraseña</label>
                    </div>

                    <button type="submit" id="submitButton">Iniciar Sesión</button>
                </form>
            </div>
        </div>

    </section>
</body>
</html>

<script>
    function mostrarAlerta() {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!"
        });
    }

    document.getElementById("submitButton").addEventListener("click", function(event) {
        mostrarAlerta();
    });
</script>