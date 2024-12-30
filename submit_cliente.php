<?php
// submit_client.php
$servername = "localhost"; // Cambia según tu configuración
$username = "tu_usuario"; // Cambia según tu configuración
$password = "tu_contraseña"; // Cambia según tu configuración
$dbname = "TIENDA"; // Cambia según tu configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$clientName = $_POST['clientName'];
$clientEmail = $_POST['clientEmail'];
$clientPhone = $_POST['clientPhone'];

// Validar datos (básicamente ya está validado en el HTML)
if (!empty($clientName) && !empty($clientEmail)) {

   // Insertar cliente en la base de datos 
   $stmt = $conn->prepare("INSERT INTO CLIENTE (nombre, email, telefono) VALUES (?, ?, ?)");
   $stmt->bind_param("sss", $clientName, $clientEmail, $clientPhone);

   if ($stmt->execute()) {
       echo "Cliente agregado con éxito.";
       
       // Redirigir a la página principal después de agregar el cliente 
       header("Location: index.php");
       exit();
       
   } else {
       echo "Error al agregar el cliente: " . $stmt->error;
   }

} else {
   echo "Por favor completa todos los campos.";
}

$stmt->close();
$conn->close();
?>
