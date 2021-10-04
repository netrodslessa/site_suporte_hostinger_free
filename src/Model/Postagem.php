<?php
class Postagem
{
  public static function selectAllI()
  {
    $con = Connetion::getConn();

    $sql = 'SELECT * FROM links';
    $sql = $con->prepare($sql);
    $sql->execute();

    $resultado = array();
    while ($row = $sql ->fetchObject('Postagem')){
      $resultado[] = $row;
    }
    // tratando caso esteja vazio
    if(!$resultado){
      throw new Exception("Não foi encontrado nenhum registro!");
    }
    return $resultado;
  }
 

  public static function insertDicas($dadosPost){
    if (empty($dadosPost['titulo']) OR empty($dadosPost['texto'])){
      throw new Exception("Preencha Todos os Campos!");
      return  false;
      
    }
    $con = Connetion::getConn();

    $sql = $con->prepare('INSERT INTO dicas (titulo, texto) VALUES (:tit, :tex)');
    $sql -> bindValue('tit', $dadosPost['titulo']);
    $sql -> bindValue('tex', $dadosPost['texto']);
    $res = $sql->execute();

    if($res == 0){
      throw new Exception('Falha ao inserir os dados!');
      return false;
    }
    return true;  
  }
  public static function insertLinks($dadosPost){
    if (empty($dadosPost['nome']) OR empty($dadosPost['link']) OR empty($dadosPost['categoria'])){
      throw new Exception("Preencha Todos os Campos!");
      return  false;
      
    }
    $con = Connetion::getConn();

    $sql = $con->prepare('INSERT INTO links (link, nome, categoria) VALUES (:lin, :nom, :cat)');
    $sql -> bindValue('lin', $dadosPost['link']);
    $sql -> bindValue('nom', $dadosPost['nome']);
    $sql -> bindValue('cat', $dadosPost['categoria']);
    $res = $sql->execute();

    if($res == 0){
      throw new Exception('Falha ao inserir os dados!');
      return false;
    }
    return true;  
  }
  public static function selecionaPorId($idPost){
    $con = Connetion::getConn();

    $sql = "SELECT * FROM dicas WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql -> bindValue(':id', $idPost, PDO::PARAM_INT);
    $sql -> execute();

    $resultado = $sql->fetchObject('Postagem');

    if (!$resultado){
      throw new Exception("Não foi encontrado nenhum registro!");
    }
    return $resultado;
  }
  public static function selecDicas()
  {
    $con = Connetion::getConn();

    $sql = 'SELECT * FROM dicas';
    $sql = $con->prepare($sql);
    $sql->execute();

    $resultado = array();
    while ($row = $sql ->fetchObject('Postagem')){
      $resultado[] = $row;
    }
    // tratando caso esteja vazio
    if(!$resultado){
      throw new Exception("Não foi encontrado nenhum registro!");
    }
    return $resultado;
  }


}

