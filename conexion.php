<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="codigocss.css">
</head>
<body>
    <header>
        <h1>Tienda Comercio Electrónico</h1>
        <input type="text" id="searchBar" placeholder="Buscar productos...">
    </header>

    <main>
        <section id="products">
            <div id="productList"></div>
        </section>
        <aside id="cartSection">
            <h2>Carrito de Compras</h2>
            <ul id="cart"></ul>
        </aside>
    </main>

    <!-- Formulario para registrar un pedido -->
<div id="orderForm">
    <h2>Registrar Pedido</h2>
    <form action="submit_order.php" method="post">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" required>
        
        <label for="tipo">Tipo de Pedido:</label>
        <input type="text" name="tipo" id="tipo" required>

        <label for="producto">Producto:</label>
        <input type="text" name="producto" id="producto" required>

        <label for="unidades">Unidades:</label>
        <input type="number" name="unidades" id="unidades" required>

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones" id="observaciones"></textarea>

        <button type="submit">Registrar Pedido</button>
    </form>
</div>

    <footer>
        <div id="notifications">
            <p id="notification"></p>
        </div>
        <div id="orderTracking">
            <p>Estado del pedido: <span id="orderStatus">Sin seguimiento</span></p>
        </div>
        <p>&copy; 2024 Tienda de Electrónica</p>

        <!-- Formulario para dejar reseñas -->
<div id="reviewForm">
    <h2>Deja tu reseña</h2>
    <form action="submit_review.php" method="post">
        <input type="hidden" name="product_id" id="product_id">
        <label for="rating">Calificación:</label>
        <select name="rating" id="rating" required>
            <option value="">Selecciona una calificación</option>
            <option value="1">1 estrella</option>
            <option value="2">2 estrellas</option>
            <option value="3">3 estrellas</option>
            <option value="4">4 estrellas</option>
            <option value="5">5 estrellas</option> <!-- Agregamos 5 estrellas -->
        </select>
        <br>
        <button type="submit">Enviar Reseña</button> <!-- Botón para enviar -->
    </form>
</div>
    </footer>

    <?php include 'review_form.php'; ?>

    <script src="java.js"></script>
</body>
</html>




