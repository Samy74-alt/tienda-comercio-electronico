<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tienda</title>
    <script>
        function validateProductForm() {
            const nombre = document.getElementById("productName").value;
            const precio = document.getElementById("productPrice").value;
            const categoria = document.getElementById("productCategory").value;

            if (nombre === "" || precio === "" || categoria === "") {
                alert("Por favor completa todos los campos del producto.");
                return false;
            }
            return true;
        }

        function validateClientForm() {
            const nombre = document.getElementById("clientName").value;
            const email = document.getElementById("clientEmail").value;

            if (nombre === "" || email === "") {
                alert("Por favor completa todos los campos del cliente.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Gestión de Productos y Clientes</h1>

    <h2>Agregar Producto</h2>
    <form action="submit_product.php" method="post" onsubmit="return validateProductForm();">
        <label for="productName">Nombre:</label>
        <input type="text" id="productName" name="productName" required><br>

        <label for="productPrice">Precio:</label>
        <input type="number" id="productPrice" name="productPrice" step="0.01" required><br>

        <label for="productCategory">Categoría:</label>
        <input type="text" id="productCategory" name="productCategory" required><br>

        <button type="submit">Agregar Producto</button>
    </form>

    <h2>Agregar Cliente</h2>
    <form action="submit_client.php" method="post" onsubmit="return validateClientForm();">
        <label for="clientName">Nombre:</label>
        <input type="text" id="clientName" name="clientName" required><br>

        <label for="clientEmail">Email:</label>
        <input type="email" id="clientEmail" name="clientEmail" required><br>

        <label for="clientPhone">Teléfono:</label>
        <input type="text" id="clientPhone" name="clientPhone"><br>

        <button type="submit">Agregar Cliente</button>
    </form>

    <!-- Mostrar contenido de las tablas -->
    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "tu_usuario"; // Cambia según tu configuración
    $password = "tu_contraseña"; // Cambia según tu configuración
    $dbname = "TIENDA";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consultar productos
    echo "<h2>Productos Registrados</h2>";
    $result = $conn->query("SELECT * FROM PRODUCTO");
    
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Categoría</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['precio']}</td><td>{$row['categoria']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay productos registrados.";
    }

    // Consultar clientes
    echo "<h2>Clientes Registrados</h2>";
    $result = $conn->query("SELECT * FROM CLIENTE");
    
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['email']}</td><td>{$row['telefono']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay clientes registrados.";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
