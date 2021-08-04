<?php
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

  socket_connect($socket, '127.0.0.1', 57576);

  $req = 'HEAD HTTP/1.1\r\n';
  $req .= 'Host: teste.com';
  $req .= 'Connection: close\r\n';
  $res = '';

  echo 'Enviando requisição...';
  socket_write($socket, $req, strlen($req));
  echo 'Blz.\n';
  
  echo 'Recebendo resposta...\n';
  $res = socket_read($socket, 2048);
  echo $res;

?>