<?php

require './config.php';
require './conexion.php';

$db = new Database();
$con = $db->conexion();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {

        $sql = $con->prepare("SELECT id, nombre, valor FROM producto WHERE id=? ");
        $sql->execute([$clave]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $id = $resultado['id'];
            $nombre = $resultado['nombre'];
            $valor = $resultado['valor'];

            $precio_final=$valor*$cantidad;

            echo '
           <tr id="producto_'.$id.'">
              <td>'.$nombre.'</td>
              <td>'.$cantidad.'</td>
              <td>$'.$valor.'</td>
              <td>$'.$precio_final.'</td>
              <td>
              <button class="btn btn-sm btn-primary" onclick="aumentarCarrito(' . $id . ', \'aumentar\')">+</button>
            <button class="btn btn-sm btn-secondary" onclick="aumentarCarrito(' . $id . ', \'disminuir\')">-</button>
              </td>
            </tr>
            ';
        } else {

            echo "<p>Product with ID $clave not found.</p>";
        }
    }
}
