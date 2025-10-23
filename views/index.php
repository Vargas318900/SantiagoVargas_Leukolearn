<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Productos</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Lista de Productos</h2>

<a href="index.php?action=crear" class="boton">Agregar Producto</a>
<form method="GET" action="index.php" style="margin-bottom: 20px;">
  <input type="hidden" name="action" value="buscar_categoria">
  <label for="categoria">Buscar por Categoría:</label>
  <input type="text" name="categoria" id="categoria" placeholder="Ej: Bebidas" required>
  <input type="submit" value="Buscar" class="boton">
</form>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Categoría</th>
      <th>Proveedor</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php if (empty($productos)): ?>
    <tr>
      <td colspan="6" class="tabla-vacia">No hay productos registrados.</td>
    </tr>
  <?php else: ?>
    <?php foreach ($productos as $p): ?>
      <tr>
        <td data-label="ID"><?= htmlspecialchars($p["id"]); ?></td>
        <td data-label="Nombre"><?= htmlspecialchars($p["nombre"]); ?></td>
        <td data-label="Precio"><?= htmlspecialchars($p["precio"]); ?></td>
        <td data-label="Categoría"><?= htmlspecialchars($p["categoria"] ?? '—'); ?></td>
        <td data-label="Proveedor"><?= htmlspecialchars($p["proveedor"] ?? '—'); ?></td>
        <td class="tabla-acciones">
          <a class="btn btn-edit" href="index.php?action=editar&id=<?= urlencode($p['id']); ?>">Editar</a>
          <a class="btn btn-del" href="index.php?action=eliminar&id=<?= urlencode($p['id']); ?>"
             onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php endif; ?>
  </tbody>
</table>

</body>
</html>
