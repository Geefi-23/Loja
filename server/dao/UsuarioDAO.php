<?php
  require '../entitys/Usuario.php';
  require 'Conexao.php';
  class UsuarioDAO{
    private $db;

    public function __construct(){
      $this->db = Conexao::getCon();
    }
    public function listAll(){
      $sql = "SELECT * FROM usuarios";
      $query = $this->db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }
    public function save($usuario){
      if (!$usuario instanceof Usuario){
        return false;
      }
      $sql = "INSERT INTO usuarios(nome, email, data_nascimento, senha) VALUES(?, ?, ?, ?)";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $usuario->getNome());
      $query->bindValue(2, $usuario->getEmail());
      $query->bindValue(3, $usuario->getDataNascimento());
      $query->bindValue(4, $usuario->getSenha());
      $query->execute();
    }
    public function delete($usuario){
      if (!$usuario instanceof Usuario){
        return false;
      }
      $sql = "DELETE FROM usuarios WHERE email = ?";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $usuario->getEmail());
      $query->execute();
    }
  }
?>