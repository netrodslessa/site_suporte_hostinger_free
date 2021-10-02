<?php

  require_once "src/core/Core.php";
  require_once "src/lib/Database/connetc.php";
  require_once "src/Controller/HomeController.php";
  require_once "src/Controller/ErroController.php";
  require_once "src/Controller/PostController.php";
  require_once "src/Controller/DicasController.php";
  require_once "src/Model/Postagem.php";
  $template = file_get_contents('src/template/extrutura.html');
  // $links = file_get_contents('src/view/link.html');

  require_once 'vendor/autoload.php';

  ob_start();
  $core = new core;
  $core -> start($_GET);

  $saida = ob_get_contents();

  ob_end_clean();
  // abaixo vai o conteúdo a ser substituido:
  $tplPronto = str_replace('{{area-dinamica}}', $saida, $template);
  // $tpllinks = str_replace('{{area-dinamica}}', $saida, $links);
  
  echo $tplPronto;
?>
  
  <script src="/src/sctipts/menu_mobs.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
  <script src="../scripts/"></script>