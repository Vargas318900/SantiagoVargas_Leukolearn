<?php
require_once "models/ProductoModelo.php";

class ProductoControlador {

    private $modelo;

    public function __construct(){
        $this->modelo = new ProductoModelo();
    }

    // LISTAR
    public function index(){
        $productos = $this->modelo->obtenerProductos();
        include "views/index.php";
    }

    // FORM CREAR
    public function crear(){
        $categorias  = $this->modelo->obtenerCategorias();
        $proveedores = $this->modelo->obtenerProveedores();
        include "views/crear.php";
    }

    // GUARDAR NUEVO
    public function guardar(){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->modelo->agregarProducto(
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['categoria'],
                $_POST['proveedor']
            );
            header("Location: index.php");
            exit;
        }
        $this->crear();
    }

    // FORM EDITAR
    public function editar($id){
        $producto    = $this->modelo->obtenerProductoPorId($id);
        if (!$producto) { die("Producto no encontrado"); }

        $categorias  = $this->modelo->obtenerCategorias();
        $proveedores = $this->modelo->obtenerProveedores();
        include "views/editar.php";
    }

    // ACTUALIZAR
    public function actualizar($id){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->modelo->actualizarProducto(
                $id,
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['categoria'],
                $_POST['proveedor']
            );
            header("Location: index.php");
            exit;
        }
        $this->editar($id);
    }

    // ELIMINAR
    public function eliminar($id){
        $this->modelo->eliminarProducto($id);
        header("Location: index.php");
        exit;
    }
    public function buscar_categoria(){
    if (isset($_GET['categoria']) && !empty(trim($_GET['categoria']))) {
        $categoria = trim($_GET['categoria']);
        $productos = $this->modelo->buscarPorCategoria($categoria);
    } else {
        $productos = []; // vacía si no se ingresó categoría
    }
    include "views/index.php";
}

}
