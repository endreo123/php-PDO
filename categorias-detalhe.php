<?php  

require_once 'global.php'; 

try{

    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->carregarProdutos();

}catch(Exception $e){
    Erro::trataErro($e);
}
?>

<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $categoria->id ?></dd>
    <dt>Nome</dt>
    <dd><?php echo $categoria->nome ?></dd>
    <dt>Produtos</dt>
    <dd>
        <ul>
        <?php foreach($categoria->produtos as $produto){ ?>
            <li><a href="produtos-editar.php?id=<?php echo $produto['id'] ?>"><?php echo $produto['nome'] ?></a></li>
            <?php } ?>
        </ul>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>
