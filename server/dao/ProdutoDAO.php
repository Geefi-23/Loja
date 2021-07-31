<?php
  require 'Conexao.php';
  class ProdutoDAO{
    private $db;

    public function __construct(){
      $this->db = Conexao::getCon();
    }
    public function listAll(){
      $sql = "SELECT p.id, p.nome, p.descricao, p.preco, c.categoria FROM produtos AS p
              JOIN categorias_produtos AS c
              ON p.categoria = c.id";
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
    public function findById($id){
      $sql = "SELECT p.id, p.nome, p.descricao, p.preco, c.categoria FROM produtos AS p
      JOIN categorias_produtos AS c
      ON p.categoria = c.id
      WHERE p.id = ?";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $id);
      $query->execute();
      return $query->fetch();
    }
  }
?>