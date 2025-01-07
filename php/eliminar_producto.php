<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$id = isset($data['id']) ? $data['id'] : null;


if (!isset($_SESSION['carrito']['productos']) || !is_array($_SESSION['carrito']['productos'])) {
    $_SESSION['carrito']['productos'] = []; 
}

if ($id !== null && isset($_SESSION['carrito']['productos'][$id])) {
    unset($_SESSION['carrito']['productos'][$id]); 

    $datos['ok'] = true;
} else {
    $datos['ok'] = false;
};

$numero = count($_SESSION['carrito']['productos']); 
$datos['numero'] = $numero;

echo json_encode($datos);
