<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em 0;
    }

    header h1 {
      margin-bottom: 5px;
    }

    header nav {
      text-align: left;
      margin-left: 5px;
    }

    .ribbon {
      width: 100%;
      background-color: #d86763;
      color: white;
      text-align: center;
      padding: 10px 0;
      z-index: 1000;
    }

    .content {
      display: flex;
      flex: 1;
    }

    .filters {
    width: 10%;
    padding: 20px;
    border: 1px solid #ddd; 
    border-radius: 10px; 
    }

    .filters form {
    display: flex;
    flex-direction: column;
    }

    .filters label {
    margin-bottom: 10px;
    }


    .filters button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 15px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 4px;
    }

    .products {
      width: 70%;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding: 20px;
    }

    .producto {
      position: relative;
      padding: 10px;
      border: 1px solid #ddd;
      box-sizing: border-box;
      transition: filter 0.3s;
    }

    .producto img {
      width: 100%;
      height: auto;
    }

    .producto:hover {
      filter: brightness(80%);
    }

    .overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 18px;
      text-align: center;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .producto:hover .overlay {
      opacity: 1;
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: left;
      padding: 1em 0;
      width: 100%;
      bottom: 0px;
    }
  </style>
</head>
<body>

  <div class="ribbon">
    ¡Oferta Especial! Envío gratis en todos los pedidos superiores a $50.
  </div>

  <header>
    <h1>Tienda de Ropa</h1>
    <nav>
      <ul>
        <li><a href="#mujer">Mujer</a></li>
        <li><a href="#hombre">Hombre</a></li>
        <li><a href="#niños">Niños</a></li>
        <li><a href="#curvy">Curvy</a></li>
        <li><a href="#streetwear">Streetwear</a></li>
        <li><a href="#accesorios">Accesorios</a></li>
      </ul>
    </nav>
  </header>
  <!-- Contenido -->
  <div class="content">
    <!-- Filtros -->
    <div class="filters">
      <h2>Filtros</h2>
      <form id="filterForm">
        <label for="priceRange">Rango de Precios</label>
        <input type="text" id="minPrice" placeholder="Min">
        <input type="text" id="maxPrice" placeholder="Max">

        <label for="colors">Colores</label>
        <select id="colors">
          <option value="">Seleccionar</option>
        </select>

        <label for="types">Tipos</label>
        <select id="types">
          <option value="">Seleccionar</option>
        </select>

        <button type="button" onclick="filterProducts()">Filtrar</button>
      </form>
    </div>

    <!-- Productos para Hombres -->
    <div class="products">
      <?php
      $categoryProducts = [
        'hombre' => [
          ['nombre' => 'Streetwear 1', 'precio' => 30.99, 'color' => 'verde', 'tipo' => 'Streetwear', 'imagen' => 'imagen1.jpg'],
          ['nombre' => 'Formal 2', 'precio' => 35.99, 'color' => 'rojo', 'tipo' => 'Formal', 'imagen' => 'imagen2.jpg'],
        ],
      ];

      foreach ($categoryProducts as $category => $products): ?>
        <section id="<?php echo $category; ?>">
          <h2><?php echo ucfirst($category); ?></h2>
          <?php foreach ($products as $product): ?>
            <div class="producto" data-color="<?php echo $product['color']; ?>" data-tipo="<?php echo $product['tipo']; ?>">
              <img src="<?php echo $product['imagen']; ?>" alt="<?php echo $product['nombre']; ?>">
              <div class="overlay"><?php echo $product['tipo']; ?></div>
              <h3><?php echo $product['nombre']; ?></h3>
              <p>Precio: $<?php echo $product['precio']; ?></p>
            </div>
          <?php endforeach; ?>
        </section>
      <?php endforeach; ?>
    </div>
  </div>

  <footer>
    <p>&copy; 2023 Tienda de Ropa</p>
  </footer>

  <script>
    function filterProducts() {
      const minPrice = document.getElementById('minPrice').value;
      const maxPrice = document.getElementById('maxPrice').value;
      const selectedColor = document.getElementById('colors').value;
      const selectedType = document.getElementById('types').value;

      // Obtener todos los productos
      const products = document.querySelectorAll('.producto');

      // Iterar sobre los productos y aplicar filtros
      products.forEach(product => {
        const price = parseFloat(product.querySelector('p').innerText.split('$')[1]);

        // Filtrar por precio
        const priceFilter = (isNaN(minPrice) || price >= parseFloat(minPrice)) && (isNaN(maxPrice) || price <= parseFloat(maxPrice));

        // Filtrar por color
        const colorFilter = selectedColor === '' || product.getAttribute('data-color') === selectedColor;

        // Filtrar por tipo
        const typeFilter = selectedType === '' || product.getAttribute('data-tipo') === selectedType;

        // Mostrar o ocultar el producto según los filtros
        product.style.display = priceFilter && colorFilter && typeFilter ? 'block' : 'none';
      });
    }
  </script>

</body>
</html>