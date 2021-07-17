<?php
  class Usuario{
    private $nome;
    private $email;
    private $dataNascimento;
    private $senha;

    public function __construct(){}
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
  }
?>