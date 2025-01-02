<?php

require 'config.php';
require 'conexion.php';
$db = new Database();
$con = $db->conexion();

$idProducto = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['id']) ? $_GET['token'] : '';

if (!empty($idProducto) && !empty($token)) {

    $token_temp = hash_hmac('sha512', $idProducto, KEY_TOKEN);

    if ($token_temp == $token) {


        $sql = $con->prepare("SELECT * FROM producto WHERE id = $idProducto");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($resultado > 0) {
            $producto = $resultado[0];
            $nombre = $producto['nombre'];
            $id = $producto['id'];
            $descripcion = $producto['descripcion'];
            $valor = $producto['valor'];

            echo '
    <div class="modal-header">
        <!--Nombre modal-->
        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">' . $nombre . '</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="cont_img">
            <img class="img_producto" id="img_modal" src="./assets/collection/pro_' . $id . '/img1.png" alt="">
        </div>

        <!--Botones modal-->
        <div id="contenedor_btn">
            <button class="cont_img" onclick="cambiarImagenModal(' . $id . ', 1)"><img id="img_modal_1" class="img_producto" src="./assets/collection/pro_' . $id . '/img1.png" alt=""></button>
            <button class="cont_img" onclick="cambiarImagenModal(' . $id . ', 2)"><img id="img_modal_2" class="img_producto" src="./assets/collection/pro_' . $id . '/img2.png" alt=""></button>
            <button class="cont_img" onclick="cambiarImagenModal(' . $id . ', 3)"><img id="img_modal_3" class="img_producto" src="./assets/collection/pro_' . $id . '/img3.png" alt=""></button>
            <button class="cont_img" onclick="cambiarImagenModal(' . $id . ', 4)"><img id="img_modal_4" class="img_producto" src="./assets/collection/pro_' . $id . '/img4.png" alt=""></button>
            <button class="cont_img" onclick="cambiarImagenModal(' . $id . ', 5)"><img id="img_modal_5" class="img_producto" src="./assets/collection/pro_' . $id . '/img5.png" alt=""></button>
        </div>


        <!--Introduccion a producto-->
        <figure class="text-center">
            <blockquote class="blockquote">
                <p id="descripcion_modal">' . $descripcion . '</p>
            </blockquote>
        </figure>
    </div>

    <div class="modal-footer d-flex justify-content-between align-items-center">
        <p class="fw-bold fs-5" id="valor_modal"> $' . $valor . '</p>
        <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="agregarCarrito(' . $id . ', \'' . $token_temp . '\')">Agregar a carrito</button>
        </div>
    </div>';
        }

        $con = null;
    };


};
