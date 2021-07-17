<?php
  class Conexao{
    static function getCon(){
      return new PDO('mysql:host=localhost;dbname=lojaphp', 'geefi', 'd4b4nkka');
    }
  }
?>