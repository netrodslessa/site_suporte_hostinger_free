<?php



class PostController
{
  public function index($params)  
  {
  
    try {
      $postagem = Postagem::selecionaPorId($params);
      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('single.html');
      // var_dump($postagem);

      $parametros = array();
      $parametros['titulo'] = $postagem->titulo;
      $parametros['texto'] = $postagem->texto;

      $conteudo = $template->render($parametros);
      echo $conteudo;

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
