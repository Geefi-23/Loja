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

    public function setId($id){
      $this->id = $id;
    }
    public function setNome($nome){
      $this->nome = $nome;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function setDataNascimento($dataNascimento){
      $this->dataNascimento = $dataNascimento;
    }
    public function setSenha($senha){
      $this->senha = $senha;
    }

    public function convertArr($array){
      $this->id = $array['id'];
      $this->nome = $array['nome'];
      $this->email = $array['email'];
      $this->dataNascimento = $array['data_nascimento'];
      $this->senha = $array['senha'];
    }
  }
?>