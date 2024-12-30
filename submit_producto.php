<?php
// submit_product.php
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
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productCategory = $_POST['productCategory'];

// Validar datos (básicamente ya está validado en el HTML)
if (!empty($productName) && !empty($productPrice) && !empty($productCategory)) {
    
    // Insertar producto en la base de datos
    $stmt = $conn->prepare("INSERT INTO PRODUCTO (nombre, precio, categoria) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $productName, $productPrice, $productCategory);

    if ($stmt->execute()) {
        echo "Producto agregado con éxito.";
        
        // Redirigir a la página principal después de agregar el producto
        header("Location: index.php");
        exit();
        
    } else {
        echo "Error al agregar el producto: " . $stmt->error;
    }

} else {
    echo "Por favor completa todos los campos.";
}

$stmt->close();
$conn->close();
?>
