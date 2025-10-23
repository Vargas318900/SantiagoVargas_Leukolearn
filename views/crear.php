<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Producto</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Agregar Producto</h2>

<form method="POST" action="index.php?action=guardar">
  <label>Nombre</label>
  <input type="text" name="nombre" required>

  <label>Precio</label>
  <input type="number" step="0.01" name="precio" required>

  <label>Categoría</label>
  <select name="categoria" required>
    <option value=""></option>
    <?php foreach ($categorias as $c): ?>
      <option value="<?= $c['id']; ?>"><?= htmlspecialchars($c['nombre']); ?></option>
    <?php endforeach; ?>
  </select>

  <label>Proveedor</label>
  <select name="proveedor" required>
    <option value=""></option>
    <?php foreach ($proveedores as $pr): ?>
      <option value="<?= $pr['id']; ?>"><?= htmlspecialchars($pr['nombre']); ?></option>
    <?php endforeach; ?>
  </select>

  <input type="submit" value="Guardar">
  <a href="index.php" class="volver-link">Volver</a>
</form>

</body>
</html>
