<?php
require_once 'global.php';
try {
    $produto = new Produto();

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria_id'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $produto->nome = $nome;
    $produto->categoria_id = $categoria;
    $produto->quantidade = $quantidade;
    $produto->preco = $preco;

    $produto->inserir();

    header('Location: produtos.php');
}catch(Exception $e){
    Erro::trataErro($e);
}
