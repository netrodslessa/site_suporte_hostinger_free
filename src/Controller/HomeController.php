<?php



class HomeController
{
  public function index()
  {
    try {
      $colectPostagem = Postagem::selectAllI();
      
      $loader = new \Twig\Loader\FilesystemLoader('src/view');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('home.html');

      $parametros = array();
      $parametros['postagens'] = $colectPostagem;

      $conteudo = $template->render($parametros);
      echo $conteudo;

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
