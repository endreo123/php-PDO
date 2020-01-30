<?php

class Categoria
{
    public $id;
    public $nome;
    public $produtos;
// carrega o objeto do banco caso o ID seja passado como parametro construtor
    public function __construct($id = FALSE) 
    {
        if ($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir($nome)//Protegido contra SQL Injection
    {
        $query = "INSERT INTO categorias(nome) VALUES(:nome)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $nome);
        $stmt->execute();
    }

    public function carregar() //Protegido contra SQL Injection
    {
        $query = "SELECT id, nome FROM categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $categoria = $stmt->fetch();
        $this->nome = $categoria['nome'];
    }

    public function atualizar()//Protegido contra SQL Injection
    {
        $query = "UPDATE categorias set nome = :nome WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()//Protegido contra SQL Injection
    {
        $query = "DELETE FROM categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorCategorias($this->id);
    }

}