<?php



class DicasController
{
  public function index()
  {
    try {
      $colectPostagem = Postagem::selecDicas();
      
      $loader = new \Twig\Loader\FilesystemLoader('src/view');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('dicas.html');

      $parametros = array();
      $parametros['postagens'] = $colectPostagem;

      $conteudo = $template->render($parametros);
      echo $conteudo;

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
