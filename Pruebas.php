<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_restaurante";
$id_estado = 1;
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";

$stmt = $conn->prepare("SELECT * FROM tbl_mesas 
                       INNER JOIN tbl_estado ON tbl_mesas.id_estado_mesa = tbl_estado.id_estado 
                       INNER JOIN tbl_users ON tbl_users.id_user = tbl_mesas.id_camarero 
                       WHERE tbl_users.id_user = ? OR tbl_users.id_user = NULL");
$stmt->bind_param("i", $user);  
// Establece el valor del parámetro
$stmt->execute();
// Obtener el resultado
$result = $stmt->get_result();
// Procesar el conjunto de resultados
while ($row = $result->fetch_assoc()) {
    // Procesar cada fila según sea necesario
    print_r($row);
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
