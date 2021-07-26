<?php
  require '../entitys/Produto.php';
  require 'Conexao.php';
  class ProdutoDAO{
    private $db;

    public function __construct(){
      $this->db = Conexao::getCon();
    }
    public function listAll(){
      $sql = "SELECT * FROM produtos";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }
    public function save($produto){
      if (!($produto instanceof Produto))
        throw new Exception('O argumento não é uma instancia da classe Produto');
      $sql = "INSERT INTO produtos(nome, descricao, preco, categoria) VALUES(?, ?, ?, ?)";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $produto->getNome());
      $query->bindValue(2, $produto->getDescricao());
      $query->bindValue(3, $produto->getPreco());
      $query->bindValue(4, $produto->getCategoria());
      $query->execute();
    }
    public function delete($produto){
      if (!($produto instanceof Produto))
        throw new Exception('O argumento não é uma instancia da classe Produto');
      $sql = "DELETE FROM produtos WHERE id = ?";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $produto->getId());
      $query->execute();
    }
  }
?>