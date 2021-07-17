<?php
  $pagina = $_GET['page'];
  echo file_get_contents("ajax-pages/{$pagina}.html");
?>