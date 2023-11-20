<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexion.php");

    // Obtener los datos del formulario de inicio de sesión
    $usuario = $_POST["name"];
    $contrasena = $_POST["password"];

    // Consultar la base de datos para verificar el inicio de sesión usando sentencias preparadas
    $sql = "SELECT id, contra FROM tbl_users WHERE nombre = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($contrasena, $row["contra"])) {
                // Autenticación exitosa, establecer variable de sesión
                $_SESSION['usuario_id'] = $row['id'];
                header("Location: ../menu.php"); 
                exit();
            } else {echo "<script>Swal.fire({
                icon: 'error',
                text: 'Credenciales incorrectas.'});}</script>";
                echo "<script>window.location.href='../index.php';</script>";
            } 
        } else {echo "<script>Swal.fire({
                icon: 'error',
                text: 'Usuario no registrado en la base de datos.'});}</script>";
                echo "<script>window.location.href='../index.php';</script>";
        }
        mysqli_stmt_close($stmt);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    // Si alguien intenta acceder directamente a este script sin enviar el formulario, redirigir o mostrar un mensaje de error
    header("Location: ../index.php"); 
    exit();
}
?>