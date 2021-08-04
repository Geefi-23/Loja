<?php
  class Usuario{
    private $id;
    private $nome;
    private $email;
    private $dataNascimento;
    private $senha;

    public function __construct(){}

    public function getId(){
      return $this->id;
    }
    public function getNome(){
      return $this->nome;
    }
    public function getEmail(){
      return $this->email;
    }
    public function getDataNascimento(){
      return $this->dataNascimento;
    }
    public function getSenha(){
      return $this->senha;
    }

    public function setId(int $id){
      $this->id = $id;
    }
    public function setNome(string $nome){
      $this->nome = $nome;
    }
    public function setEmail(string $email){
      $this->email = $email;
    }
    public function setDataNascimento(string $dataNascimento){
      $this->dataNascimento = $dataNascimento;
    }
    public function setSenha(string $senha){
      $this->senha = $senha;
    }

    public static function convertArr(Array $array){
      $user = new Usuario();
      $user->id = $array['id'];
      $user->nome = $array['nome'];
      $user->email = $array['email'];
      $user->dataNascimento = $array['data_nascimento'];
      $user->senha = $array['senha'];
      return $user;
    }
  }
?>