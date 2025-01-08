<?php

require 'config.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : ''; 

$datos = ['ok' => false]; // Inicializamos $datos para evitar errores.

if (!empty($id) && !empty($accion)) {

    if (!isset($_SESSION['carrito']['productos']) || !is_array($_SESSION['carrito']['productos'])) {
        $_SESSION['carrito']['productos'] = []; 
    }

    if ($accion == 'aumentar') {  
        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id] += 1;
        } else {
            $_SESSION['carrito']['productos'][$id] = 1;
        }
        $datos['ok'] = true;

    } elseif ($accion == 'disminuir') {
        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id] -= 1;

            // Eliminar el producto si la cantidad es 0
            if ($_SESSION['carrito']['productos'][$id] <= 0) {
                unset($_SESSION['carrito']['productos'][$id]);
            }
        }
        $datos['ok'] = true; // Indica que la acción de disminuir fue procesada.
    }
}

echo json_encode($datos);
