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

            echo '
            <div class="card d-flex justify-content-center align-items-center position-relative mb-1"
                 style="max-width: 100%;">
                <button type="button" class="btn-close position-absolute" aria-label="Close"></button>
                <div class="row g-0 d-flex justify-content-center align-items-center w-100">
                    <div class="cont_img_carro item_info">
                        <img src="./assets/collection/pro_'.$id.'/img1.png" class="img-fluid rounded-start img_carro" alt="...">
                    </div>
                    <div class="item_info">
                        <div class="card-body">
                            <h5 class="card-title fs-6">'.$nombre.'</h5>
                            <p class="card-text">$'.$valor.'</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
        } else {
    
            echo "<p>Product with ID $clave not found.</p>"; 
        }
    }
}else {
  
    echo "<p>Carro vacio</p>"; 
}

?>