<?php if (!$producto) { die("Producto no encontrado."); } ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Editar Producto</h2>

<form method="POST" action="index.php?action=actualizar&id=<?= urlencode($producto['id']); ?>">
  <label>Nombre</label>
  <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']); ?>" required>

  <label>Precio</label>
  <input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($producto['precio']); ?>" required>

  <label>Categoría</label>
  <select name="categoria" required>
    <?php foreach ($categorias as $c): ?>
      <option value="<?= $c['id']; ?>" <?= ($producto['id_categoria']==$c['id'])?'selected':''; ?>>
        <?= htmlspecialchars($c['nombre']); ?>
      </option>
    <?php endforeach; ?>
  </select>

  <label>Proveedor</label>
  <select name="proveedor" required>
    <?php foreach ($proveedores as $pr): ?>
      <option value="<?= $pr['id']; ?>" <?= ($producto['id_proveedor']==$pr['id'])?'selected':''; ?>>
        <?= htmlspecialchars($pr['nombre']); ?>
      </option>
    <?php endforeach; ?>
  </select>

  <input type="submit" value="Actualizar">
  <a href="index.php" class="volver-link">Volver</a>
</form>

</body>
</html>
