<?php 

require_once 'cabecalho.php'; 
require_once 'global.php';
try{
    $produto = new Produto();
    $listaDeProdutos = $produto->listar();

}catch(Exception $e){
    Erro::trataErro($e);
}

?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Criar Novo Produto</a>
    </div>
</div>
<?php if(count($listaDeProdutos) > 0) { ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($listaDeProdutos as $produto){ ?>
                    <tr>
                        <td><?php echo $produto['id'] ?></td>
                        <td><?php echo $produto['nome'] ?></td>
                        <td><?php echo $produto['preco'] ?></td>
                        <td><?php echo $produto['quantidade'] ?></td>
                        <td><?php echo $produto['categoria_nome'] ?></td>
                        <td><a href="produtos-editar.php?id=<?php echo $produto['id'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="produtos-excluir-post.php?id=<?php echo $produto['id'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else{
    echo 'Não Existem produtos registrados';
}

?>
<?php require_once 'rodape.php' ?>
