<?php

require './config.php';
require './conexion.php';

$db = new Database();
$con = $db->conexion();

$datos = [
    'ok' => false, 
    'final' => 0 
];

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

if ($productos != null && is_array($productos)) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $con->prepare("SELECT valor FROM producto WHERE id=?");
        $sql->execute([$clave]);
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $valor = $resultado['valor'];
            $datos['final'] += $valor * $cantidad;
        }
    }
    $datos['ok'] = true;
} else {
    $datos['ok'] = true; 
}

echo json_encode($datos);
