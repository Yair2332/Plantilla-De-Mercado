<?php

require 'config.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$token = isset($_POST['token']) ? $_POST['token'] : ''; 

if (!empty($id) && !empty($token)) {

    $token_temp = hash_hmac('sha512', $id, KEY_TOKEN);

    if ($token_temp == $token) {

        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id]+=1;
        }else{
            $_SESSION['carrito']['productos'][$id]=1;
        }

        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok']= true;

    }else{
        $datos['ok']=false;
    }
}else{
    $datos['ok']=false;
};

echo json_encode($datos);