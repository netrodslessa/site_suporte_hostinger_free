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
    $parametros['postagens'] = $objItens;

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
      echo '<script>alert("' . $e->getMessage() . '")</script>';
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
      echo '<script>alert("' . $e->getMessage() . '")</script>';
      echo '<script>location.href="/?pagina=admin&metodo=create"</script>';
    }
  }
  public function change($paramId)
  {
    $loader = new \Twig\Loader\FilesystemLoader('src/View');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load('update.html');

    $post = Postagem::selecionaPorId($paramId);


    $parametros = array();
    $parametros['id'] = $post->id;
    $parametros['titulo'] = $post->titulo;
    $parametros['texto'] = $post->texto;

    $conteudo = $template->render($parametros);
    echo $conteudo;
  }

  public function chlista($paramId)
  {
    $loader = new \Twig\Loader\FilesystemLoader('src/View');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load('updateli.html');

    $post_ = Postagem::selecionaPorLinkId($paramId);

    $parametros = array();
    $parametros['id'] = $post_->id;
    $parametros['link'] = $post_->link;
    $parametros['categoria'] = $post_->categoria;
    $parametros['nome'] = $post_->nome;

    $conteudo = $template->render($parametros);
    echo $conteudo;
  }
  public function updatelinks()
  {
    try {
      Postagem::updatelinks($_POST);
      echo "<script>alert('Sucesso ao Salvar')</script>";
      echo '<script>location.href="/"</script>';
    } catch (Exception $e) {
      echo '<script>alert("' . $e->getMessage() . '")</script>';
      echo '<script>location.href="/?pagina=admin&metodo=chlist&id=' . $_POST["id"] . '</script>';
    }
  }
  public function updatedicas()
  {
    try {

      Postagem::updatedicas($_POST);
      echo "<script>alert('Sucesso ao Salvar')</script>";
      echo '<script>location.href="/"</script>';
    } catch (Exception $e) {
      echo '<script>alert("' . $e->getMessage() . '")</script>';
      echo '<script>location.href="/?pagina=admin&metodo=create&id=' . $_POST["id"] . '</script>';
    }
  }
  public function deletedicas($paramId)
  {
    try {
      Postagem::deletedicas($paramId);
      echo "<script>alert('Sucesso ao Deletar')</script>";
      echo '<script>location.href="/"</script>';
    } catch (Exception $e) {
      echo '<script>alert("' . $e->getMessage() . '")</script>';
      echo '<script>location.href="/?pagina=admin&metodo=index"</script>';
    }
  }

  public function deletedinks($paramId)
  {
    try {
      Postagem::deletedinks($paramId);
      echo "<script>alert('Sucesso ao Deletar')</script>";
      echo '<script>location.href="/"</script>';
    } catch (Exception $e) {
      echo '<script>alert("' . $e->getMessage() . '")</script>';
      echo '<script>location.href="/?pagina=admin&metodo=index"</script>';
    }
  }
}
