<?php
require_once 'controllers/ProductoControlador.php';

$controller = new ProductoControlador();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'crear':      $controller->crear(); break;
    case 'guardar':    $controller->guardar(); break;
    case 'editar':     if (isset($_GET['id'])) $controller->editar($_GET['id']); break;
    case 'actualizar': if (isset($_GET['id'])) $controller->actualizar($_GET['id']); break;
    case 'eliminar':   if (isset($_GET['id'])) $controller->eliminar($_GET['id']); break;
    case 'buscar_categoria': $controller->buscar_categoria(); break;
    default:            $controller->index();
}
?>
