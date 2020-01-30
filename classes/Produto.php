<?php

class Produto
{
    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;


    public static function listarPorCategorias($categoria_id)
    {
        $query = "SELECT id, nome, preco, quantidade FROM produtos WHERE categoria_id = :categoria_id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        return $stmt->fetchAll();

    } 

    public function listar()
    {
        $query = "SELECT p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria_nome
                  FROM produtos p
                  INNER JOIN categorias c ON p.categoria_id = c.id
                  ORDER BY p.id ";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchall();
        return $lista;
    }  

    public function inserir()//Protegido contra SQL Injection
    {
        $query = $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id)
                           VALUES (:nome, :preco, :quantidade, :categoria_id)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute();
    }

    public function carregar()//Protegido contra SQL Injection
    {
        $query = "SELECT id, nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id ";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $produto = $stmt->fetchAll();
        foreach($produto as $item){
            $this->nome = $item['nome'];
            $this->categoria_id = $item['categoria_id'];
            $this->preco = $item['preco'];
            $this->quantidade = $item['quantidade'];       
        }
    }

    public function atualizar()//Protegido contra SQL Injection
    {
        $query = "UPDATE produtos
                  SET 
                    nome = :nome, 
                    preco = :preco,
                    quantidade = :quantidade,  
                    categoria_id = :categoria_id
                  WHERE id = :id";

        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()//Protegido contra SQL Injection
    {
        $query = "DELETE FROM produtos WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
}

?>