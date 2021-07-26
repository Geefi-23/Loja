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
      if (!($usuario instanceof Usuario)){
        throw new Exception('O argumento não é uma instancia da classe Usuario');
        
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
      if (!($usuario instanceof Usuario))
        throw new Exception('O argumento não é uma instancia da classe Usuario');
      $sql = "DELETE FROM usuarios WHERE email = ?";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $usuario->getEmail());
      $query->execute();
    }
    public function findByAuthCred($usuario){
      if (!($usuario instanceof Usuario))
        throw new Exception('O argumento não é uma instancia da classe Usuario');
      $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $usuario->getEmail());
      $query->bindValue(2, $usuario->getSenha());
      $query->execute();
      $results = $query->fetchAll();
      if (sizeof($results) == 0 || sizeof($results) > 1)
        return null;
      $user = new Usuario();
      $user->convertArr($results[0]);
      return $user;
    }
    public function findByEmail($email){
      if (!is_string($email))
        throw new Exception('O argumento não é uma String');
      $sql = "SELECT * FROM usuarios WHERE email = ?";
      $query = $this->db->prepare($sql);
      $query->bindValue(1, $email);
      $query->execute();
      $results = $query->fetchAll();
      if (empty($results[0]))
        return null;
      $usuario = new Usuario();
      $usuario->setId($results[0]['id']);
      $usuario->setNome($results[0]['nome']);
      $usuario->setEmail($results[0]['email']);
      $usuario->setDataNascimento($results[0]['data_nascimento']);
      $usuario->setSenha($results[0]['senha']);
      return $usuario;
    }
  }
?>