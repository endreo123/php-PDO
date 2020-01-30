<?php require_once 'cabecalho.php';
      require_once 'global.php';

    $produto = new Produto();
    $id = $_GET['id'];
    $produto->id = $id;
    $produto->carregar();

    $categorias = new Categoria;
    $listaDeCategorias = $categorias->listar();

?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="produtos-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <input type="hidden" name ="id" value="<?php echo $produto->id ?>" class="form-control" placeholder="ID do Produto" required>
                <label for="nome">Nome do Produto</label>
                <input name="nome" type="text" value="<?php echo $produto->nome ?>" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input name="preco" type="number" value="<?php echo $produto->preco ?>" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input name="quantidade" type="number"  value="<?php echo $produto->quantidade ?>" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria do Produto</label>
                <select name="categoria" class="form-control">
                    <?php foreach($listaDeCategorias as $categoria){ 
                        if($categoria['id'] == $produto->categoria_id){ 
                    ?>
                        <option value="<?php echo $categoria['id'] ?>" selected><?php echo $categoria['nome'] ?></option>

                    <?php }else { ?>

                        <option value="<?php echo $categoria['id'] ?>"> <?php echo $categoria['nome'] ?> </option>

                    <?php } } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
