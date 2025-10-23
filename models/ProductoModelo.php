<?php
require_once "config.php";

class ProductoModelo {
    private $db;

    public function __construct(){
        global $pdo;
        $this->db = $pdo;
    }

    public function obtenerProductos(){
        $sql = "SELECT p.id, p.nombre, p.precio,
                       c.nombre AS categoria,
                       prov.nombre AS proveedor
                FROM productos p
                LEFT JOIN categoria c   ON p.id_categoria = c.id
                LEFT JOIN proveedores prov ON p.id_proveedor = prov.id";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProductoPorId($id){
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function agregarProducto($nombre,$precio,$id_categoria,$id_proveedor){
        $sql = "INSERT INTO productos (nombre, precio, id_categoria, id_proveedor)
                VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre,$precio,$id_categoria,$id_proveedor]);
    }

    public function actualizarProducto($id,$nombre,$precio,$id_categoria,$id_proveedor){
        $sql = "UPDATE productos
                SET nombre = ?, precio = ?, id_categoria = ?, id_proveedor = ?
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre,$precio,$id_categoria,$id_proveedor,$id]);
    }

    public function eliminarProducto($id){
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function obtenerCategorias(){
        $stmt = $this->db->query("SELECT * FROM categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProveedores(){
        $stmt = $this->db->query("SELECT * FROM proveedores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPorCategoria($nombreCategoria){
    $sql = "SELECT p.id, p.nombre, p.precio,
                   c.nombre AS categoria,
                   prov.nombre AS proveedor
            FROM productos p
            JOIN categoria c ON p.id_categoria = c.id
            LEFT JOIN proveedores prov ON p.id_proveedor = prov.id
            WHERE LOWER(c.nombre) LIKE LOWER(?)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['%' . $nombreCategoria . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
