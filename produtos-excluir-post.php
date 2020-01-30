<?php require_once 'global.php';
try{
    $id = $_GET['id'];
    $produto = new Produto;
    $produto->id = $id;

    $produto->excluir();
}catch(Exception $e){
    Erro::trataErro($e);
}

header('Location: produtos.php');