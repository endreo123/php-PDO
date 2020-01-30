<?php require_once 'global.php';
try {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria_id = $_POST['categoria'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $produto = new Produto();
    $produto->id = $id;
    $produto->nome = $nome;
    $produto->categoria_id = $categoria_id;
    $produto->quantidade = $quantidade;
    $produto->preco = $preco;

    $produto->atualizar();

}catch(Exception $e){
    Erro::trataErro($e);
}

header('Location: produtos.php');
?>