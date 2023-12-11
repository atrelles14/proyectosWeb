<!-- hombres.php -->
<?php include 'template.php'; ?>

<?php
// Código específico para la categoría de hombres...
$categoryProducts = [
  'hombre' => [
    ['nombre' => 'Streetwear 1', 'precio' => 30.99, 'color' => 'verde', 'tipo' => 'Streetwear', 'imagen' => 'hombre1.jpg'],
    ['nombre' => 'Formal 2', 'precio' => 35.99, 'color' => 'rojo', 'tipo' => 'Formal', 'imagen' => 'hombre2.jpg'],
  ],
  // ... Puedes agregar más productos y categorías según sea necesario
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
