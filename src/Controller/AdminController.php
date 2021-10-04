<?php



class AdminController
{
  public function index($conteudo)
  {
   
    $loader = new \Twig\Loader\FilesystemLoader('src/view');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load('admin.html');

    $objItens = Postagem::selectAllI();

    $parametros = array();
    $parametros['postagens']= $objItens;

    $conteudo = $template->render($parametros);
    echo $conteudo;
  }

  
  public function create()
  {
    $loader = new \Twig\Loader\FilesystemLoader('src/view');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load('create.html');

    $parametros = array();

    $conteudo = $template->render($parametros);
    echo $conteudo;
  }
  public function insertDicas()
  {
    try {
      // Tratar
      Postagem::insertDicas($_POST);
      echo "<script>if (window.confirm(`Sucesso ao salvar, deseja inserir algo mais?`)) {  window.open(`/?pagina=admin&metodo=create`, `location.href='/?pagina=admin'`)}</script>";
    } catch (Exception $e) {
      echo '<script>alert("'.$e->getMessage(). '")</script>';
      echo '<script>location.href="/?pagina=admin&metodo=create"</script>';

    }
  }
  public function insertLinks()
  {
    try {
      // Tratar
      Postagem::insertLinks($_POST);
      echo "<script>if (window.confirm(`Sucesso ao salvar, deseja inserir algo mais?`)) {  window.open(`/?pagina=admin&metodo=create`, `location.href='/?pagina=admin'`)}</script>";
    } catch (Exception $e) {
      echo '<script>alert("'.$e->getMessage(). '")</script>';
      echo '<script>location.href="/?pagina=admin&metodo=create"</script>';

    }

    
  }
}
