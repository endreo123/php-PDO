<?php 
require_once 'cabecalho.php';
require_once 'global.php';
try {
    $listaDeCategorias = Categoria::listar();

}catch(Exception $e){
    Erro::trataErro($e);
}


?>
<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Produto</h2>
    </div>
</div>
<form action="produtos-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input name='nome' type="text" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input name='preco' type="number" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input name='quantidade' type="number"  min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria do Produto</label>
                <select name='categoria_id' class="form-control">
                    <?php foreach($listaDeCategorias as $item){?>
                        <option value="<?php echo $item['id']?>"><?php echo $item['nome'] ?></option>

                    <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
