<?php
    require_once 'global.php';
//TODO: Tratar, de forma correta, erro ao tentar deletar categoria ja vinculada a algum produto
try {

    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->excluir();

}catch(Exception $e){
    echo 'Impossivel Deletar uma Categoria vinculada a algum produto';
    exit();
}

header('Location: categorias.php');

?>