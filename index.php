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
